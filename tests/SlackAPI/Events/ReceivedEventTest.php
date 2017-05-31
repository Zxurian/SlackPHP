<?php

namespace SlackPHP\Tests\SlackAPI\Events;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Events\ReceivedEvent;
use GuzzleHttp\Psr7\Response;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ReceivedEvent
 */
class ReceivedEventTest extends TestCase
{
    /** 
     * Test setting response
     */
    public function testSettingResponse()
    {
        $response = new Response();
        $receivedEventObject = new ReceivedEvent();
        $returnedObject = $receivedEventObject->setResponse($response);
        $refReceivedEventObject = new \ReflectionObject($receivedEventObject);
        $responseProperty = $refReceivedEventObject->getProperty('response');
        $responseProperty->setAccessible(true);
        $this->assertInstanceOf(Response::class, $responseProperty->getValue($receivedEventObject));
        $this->assertInstanceOf(ReceivedEvent::class, $returnedObject);
    }
    
    /**
     * Test for getting response
     */
    public function testGetResponse()
    {
        $response = new Response();
        $receivedEventObject = new ReceivedEvent();
        $refReceivedEventObject = new \ReflectionObject($receivedEventObject);
        $responseProperty = $refReceivedEventObject->getProperty('response');
        $responseProperty->setAccessible(true);
        $responseProperty->setValue($receivedEventObject, $response);
        
        $this->assertInstanceOf(Response::class, $receivedEventObject->getResponse());
    }
}