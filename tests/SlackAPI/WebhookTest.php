<?php

namespace SlackPHP\Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Webhook;

/**
 * @author Zxurian
 * @covers Webhook
 */
class WebhookBotTest extends TestCase
{
    private $testUrl= 'http://foo.com';
    
    /**
     * Test creating class 
     */
    public function testConstruct()
    {
        $webhook = new Webhook($this->testUrl);
        
        $this->assertInstanceOf(Webhook::class, $webhook);
    }
    
    /**
     * Test for providing invalid token in construct
     */
    public function testInvalidTokenToConstruct()
    {
        $this->expectException(\InvalidArgumentException::class);
        $slackAPIObject = new Webhook(null);
    }
    
    /**
     * Test send payload
     */
    public function testSend()
    {
        
    }
}
