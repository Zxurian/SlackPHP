<?php

namespace SlackPHP\Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\AppBot;
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
    
    private $dummyString = 'String';
    
    /**
     * Test creating class 
     */
    public function testConstruct()
    {
        $appBot = new AppBot($this->testOAuthToken);
        
        $this->assertInstanceOf(AppBot::class, $appBot);
    }
    
    /**
     * Test for providing invalid token in construct
     */
    public function testInvalidTokenToConstruct()
    {
        $this->expectException(\InvalidArgumentException::class);
        $slackAPIObject = new AppBot(null);
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
        $methodEnum->method('isAvailableToAppBot')->willReturn(false);
        $groupsMarkPayload = $this->createMock(GroupsMark::class);
        $groupsMarkPayload->method('getMethod')->willReturn($methodEnum);
        
        $appBot = new AppBot($this->testOAuthToken);
        $appBot->send($groupsMarkPayload);
    }
}
