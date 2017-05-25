<?php

namespace Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\SlackAPI;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use SlackPHP\SlackAPI\Models\Methods\GroupsList;
use SlackPHP\SlackAPI\Models\Methods\GroupsListResponse;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use Symfony\Component\EventDispatcher\EventDispatcher;
use SlackPHP\SlackAPI\AppBot;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers SlackAPI
 */
class SlackAPITest extends TestCase
{
    private $dummyString = 'String';

    /**
     * Test, that all the initial properties can be set for SlackAPI in constructor
     */
    public function testConstruct()
    {
        $slackAPIObject = new SlackAPI($this->dummyString);
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $tokenProperty = $refSlackAPIObject->getProperty('token');
        $tokenProperty->setAccessible(true);

        $this->assertEquals($this->dummyString, $tokenProperty->getValue($slackAPIObject));
    }
    
    /**
     * Test for providing invalid token in construct
     */
    public function testInvalidTokenToConstruct()
    {
        $this->expectException(\InvalidArgumentException::class);
        $slackAPIObject = new SlackAPI(new \stdClass());
    }
    
    /**
     * Test for getting client
     */
    public function testGetClient()
    {
        $slackAPIObject = new SlackAPI();
        $this->assertInstanceOf(ClientInterface::class, $slackAPIObject->getClient());
    }
    
    /**
     * Test for getting eventDispatcher
     */
    public function testGetEventDispatcher()
    {
        $slackAPIObject = new SlackAPI();
        $this->assertInstanceOf(EventDispatcherInterface::class, $slackAPIObject->getEventDispatcher());
    }
    
    /**
     * Test for setting client
     */
    public function testSetClient()
    {
        $slackAPIObject = new SlackAPI();
        $client = new Client();
        $slackAPIObject->setClient($client);
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $clientProperty = $refSlackAPIObject->getProperty('client');
        $clientProperty->setAccessible(true);
        
        $this->assertInstanceOf(Client::class, $clientProperty->getValue($slackAPIObject));
    }
    
    /**
     * Test for setting eventDispatcher
     */
    public function testSetEventDispatcher()
    {
        $slackAPIObject = new SlackAPI();
        $eventDispatcher = new EventDispatcher();
        $slackAPIObject->setEventDispatcher($eventDispatcher);
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $eventDispatcherProperty = $refSlackAPIObject->getProperty('eventDispatcher');
        $eventDispatcherProperty->setAccessible(true);
    
        $this->assertInstanceOf(EventDispatcherInterface::class, $eventDispatcherProperty->getValue($slackAPIObject));
    }
    
    /**
     * Test for creating new AppBot
     */
    public function testCreateAppBot()
    {
        $slackAPIObject = new SlackAPI();
        $returnedObject = $slackAPIObject->createAppBot($this->dummyString);
        $refReturnedObject = new \ReflectionObject($returnedObject);
        $botTokenProperty = $refReturnedObject->getProperty('botToken');
        $botTokenProperty->setAccessible(true);
        
        $this->assertEquals($this->dummyString, $botTokenProperty->getValue($returnedObject));
        $this->assertInstanceOf(AppBot::class, $returnedObject);
        
    }
    
    /**
     * Test for sending payload
     */
    public function testSend()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], '{"ok":true,"groups":[{"id":"'. $this->dummyString .'"}]}'),
        ]);
        $handler = HandlerStack::create($mockHandler);
        $client = new Client(['handler' => $handler]);

        $channelsListPayload = new GroupsList();
        $channelsListPayload->setToken($this->dummyString);
        $slackAPIObject = new SlackAPI();
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $clientProperty = $refSlackAPIObject->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($slackAPIObject, $client);
        $returnResponseObject = $slackAPIObject->send($channelsListPayload);
        
        $this->assertEquals(true, $returnResponseObject->getOk());
        $this->assertEquals(1, count($returnResponseObject->getGroups()));
        $this->assertInstanceOf(GroupsListResponse::class, $returnResponseObject);
    }
    
    /**
     * Test that exception is thrown if Slack API responded with other that 200 code
     */
    public function testInvalidResponseCodeOnSend()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_200_FROM_SLACK_SERVER);
        $mockHandler = new MockHandler([
            new Response(201),
        ]);
        $handler = HandlerStack::create($mockHandler);
        $client = new Client(['handler' => $handler]);
        
        $channelsListPayload = new GroupsList();
        $channelsListPayload->setToken($this->dummyString);
        $slackAPIObject = new SlackAPI();
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $clientProperty = $refSlackAPIObject->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($slackAPIObject, $client);
        $returnResponseObject = $slackAPIObject->send($channelsListPayload);
    }
}