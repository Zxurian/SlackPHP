<?php

namespace Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Methods\GroupsMark;
use SlackPHP\SlackAPI\Enumerators\Method;
use SlackPHP\SlackAPI\CustomBot;

/**
 * @author Zxurian
 * @covers CustomBot
 */
class CustomBotTest extends TestCase
{
    private $testOAuthToken= 'xoxp-00000000000-00000000000-000000000000-00000000000000000000000000000000';
    
    private $dummyString = 'String';
    
    /**
     * Test creating class 
     */
    public function testConstruct()
    {
        $appBot = new CustomBot($this->testOAuthToken);
        
        $this->assertInstanceOf(CustomBot::class, $appBot);
    }
    
    /**
     * Test for providing invalid token in construct
     */
    public function testInvalidTokenToConstruct()
    {
        $this->expectException(\InvalidArgumentException::class);
        $slackAPIObject = new CustomBot(null);
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
        $methodEnum->method('isAvailableToCustomBot')->willReturn(false);
        $groupsMarkPayload = $this->createMock(GroupsMark::class);
        $groupsMarkPayload->method('getMethod')->willReturn($methodEnum);
        
        $appBot = new CustomBot($this->testOAuthToken);
        $appBot->send($groupsMarkPayload);
    }
}
