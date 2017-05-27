<?php

namespace Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\WebAPI;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use SlackPHP\SlackAPI\Models\Methods\GroupsList;
use SlackPHP\SlackAPI\Models\Methods\GroupsListResponse;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers WebAPI
 */
class WebAPITest extends TestCase
{
    private $dummyString = 'String';

    /**
     * Test, that all the initial properties can be set for SlackAPI in constructor
     */
    public function testConstruct()
    {
        $slackAPIObject = new SlackWebAPI($this->dummyString);
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $tokenProperty = $refSlackAPIObject->getProperty('token');
        $tokenProperty->setAccessible(true);
        $clientProperty = $refSlackAPIObject->getProperty('client');
        $clientProperty->setAccessible(true);
        $eventDispatcherProperty = $refSlackAPIObject->getProperty('eventDispatcher');
        $eventDispatcherProperty->setAccessible(true);

        $this->assertEquals($this->dummyString, $tokenProperty->getValue($slackAPIObject));
        $this->assertInstanceOf(ClientInterface::class, $clientProperty->getValue($slackAPIObject));
        $this->assertInstanceOf(EventDispatcherInterface::class, $eventDispatcherProperty->getValue($slackAPIObject));
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
        $slackAPIObject = new SlackWebAPI();
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
        $slackAPIObject = new SlackWebAPI();
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $clientProperty = $refSlackAPIObject->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($slackAPIObject, $client);
        $returnResponseObject = $slackAPIObject->send($channelsListPayload);
    }
}