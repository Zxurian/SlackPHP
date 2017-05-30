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
use SlackPHP\SlackAPI\Models\Methods\GroupsMark;
use SlackPHP\SlackAPI\Enumerators\Method;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers AppBot
 */
class AppBotTest extends TestCase
{
    private $testOAuthToken= 'xoxp-00000000000-00000000000-000000000000-00000000000000000000000000000000';
    
    private $testOAuthToken2 = 'xoxp-11111111111-00000000000-000000000000-00000000000000000000000000000000';
    
    private $dummyString = 'String';
    
    /**
     * Test for construct 
     */
    public function testConstruct()
    {
        $appBot = new AppBot($this->testOAuthToken);
        
        $this->assertInstanceOf(AppBot::class, $appBot);
    }
    
    /**
     * Test send payload
     */
    public function testSend()
    {
    }
    
    /**
     * Test sending invalid unavailable payload
     */
    public function testSendInvalidPayload()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::INVALID_APPBOT_METHOD);
        
        $methodEnum = $this->createMock(Method::class);
        $methodEnum->method('isAvailableToBot')->willReturn(false);
        $groupsMarkPayload = $this->createMock(GroupsMark::class);
        $groupsMarkPayload->method('getMethod')->willReturn($methodEnum);
        
        $appBot = new AppBot($this->testOAuthToken);
        $appBot->send($groupsMarkPayload);
    }
}
