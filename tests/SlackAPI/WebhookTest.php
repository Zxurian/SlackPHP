<?php

namespace SlackPHP\Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Webhook;
use SlackPHP\SlackAPI\Models\MessageParts\Message;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Serializer;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use SlackPHP\SlackAPI\Exceptions\WebhookException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers Webhook
 */
class WebhookTest extends TestCase
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
     * Test send payload with 200 and other response codes in response
     */
    public function testSend()
    {
        $jsonPayload = '{"text":"custom text"}';
        $message = new Message();
        $message->setText($this->testUrl);
        $serializer = $this->createMock(Serializer::class);
        $serializer
            ->expects($this->any())
            ->method('serialize')
            ->will($this->returnValue($jsonPayload))
        ;
        $mockHandler = new MockHandler([
            new Response(200, [], 'ok'),
            new Response(403),
        ]);
        $handler = HandlerStack::create($mockHandler);
        $client = new Client(['handler' => $handler]);
        $mockWebhook = $this->getMockBuilder(Webhook::class)
            ->setConstructorArgs([ $this->testUrl ])
            ->setMethods(['getClient', 'getSerializer'])
            ->getMock()
        ;
        $mockWebhook
            ->expects($this->any())
            ->method('getSerializer')
            ->will($this->returnValue($serializer))
        ;
        $mockWebhook
            ->expects($this->any())
            ->method('getClient')
            ->will($this->returnValue($client))
        ;
        
        $return = $mockWebhook->send($message);
        $this->assertEquals('ok', $return);
        
        $this->expectException(WebhookException::class);
        $mockWebhook->send($message);
    }
}
