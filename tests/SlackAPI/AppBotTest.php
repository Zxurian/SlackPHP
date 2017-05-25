<?php

namespace Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\SlackAPI;
use SlackPHP\SlackAPI\AppBot;
use SlackPHP\SlackAPI\Models\Methods\GroupsList;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use SlackPHP\SlackAPI\Models\Methods\GroupsListResponse;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers AppBot
 */
class AppBotTest extends TestCase
{
    private $dummyString = 'String';
    
    /**
     * Test for construct 
     */
    public function testConstruct()
    {
        $slackAPI = new SlackAPI();
        $appBot = new AppBot($slackAPI);
        $refAppBot = new \ReflectionObject($appBot);
        $slackAPIProperty = $refAppBot->getProperty('slackAPI');
        $slackAPIProperty->setAccessible(true);
        
        $this->assertInstanceOf(SlackAPI::class, $slackAPIProperty->getValue($appBot));
    }
    
    /**
     * Test for setting botToken
     */
    public function testSettingBotToken()
    {
        $slackAPI = new SlackAPI();
        $appBot = new AppBot($slackAPI);
        $returnedObject = $appBot->setBotToken($this->dummyString);
        $refAppBot = new \ReflectionObject($appBot);
        $botTokenProperty = $refAppBot->getProperty('botToken');
        $botTokenProperty->setAccessible(true);
        
        $this->assertEquals($this->dummyString, $botTokenProperty->getValue($appBot));
        $this->assertInstanceOf(AppBot::class, $returnedObject);
    }
    
    /**
     * Test for setting invalid botToken
     */
    public function testSettingInvalidBotToken()
    {
        $this->expectException(\InvalidArgumentException::class);
        $slackAPI = new SlackAPI();
        $appBot = new AppBot($slackAPI);
        $returnedObject = $appBot->setBotToken(new \stdClass());
    }
    
    /**
     * Test send payload
     */
    public function testSend()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], '{"ok":true,"groups":[{"id":"'. $this->dummyString .'"}]}'),
        ]);
        $handler = HandlerStack::create($mockHandler);
        $client = new Client(['handler' => $handler]);
        
        $groupsListPayload = new GroupsList();
        $groupsListPayload->setToken($this->dummyString);
        $slackAPI = new SlackAPI();
        $slackAPI->setClient($client);
        $appBot = new AppBot($slackAPI);
        $returnResponseObject = $appBot->send($groupsListPayload);
        
        $this->assertEquals(true, $returnResponseObject->getOk());
        $this->assertEquals(1, count($returnResponseObject->getGroups()));
        $this->assertInstanceOf(GroupsListResponse::class, $returnResponseObject);
    }
    
//     /**
//      * Test sending invalid unavailable payload
//      */
//     public function testSendInvalidPayload()
//     {
//         $this->expectException(SlackException::class);
//         $this->expectExceptionCode(SlackException::INVALID_APPBOT_METHOD);
        
//         $groupsListPayload = new GroupsList();
//         $groupsListPayload->setToken($this->dummyString);
//         $slackAPI = new SlackAPI();
//         $appBot = new AppBot($slackAPI);
//         $refGroupsListPayload = new \ReflectionClass($groupsListPayload);
//         $methodConst = $refGroupsListPayload->getConstant('method');
//         $methodConst->
//         $appBot->send($groupsListPayload);
//     }
}
