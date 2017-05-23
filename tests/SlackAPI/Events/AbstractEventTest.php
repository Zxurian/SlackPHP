<?php

namespace Tests\SlackAPI\Events;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Events\ReceivedEvent;
use SlackPHP\SlackAPI\Models\Methods\ChannelsList;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers AbstractEvent
 */
class AbstractEventTest extends TestCase
{
    /**
     * Test setting payload
     */
    public function testSettingPayload()
    {
        $payloadObject = new ChannelsList();
        $receivedEventObject = new ReceivedEvent();
        $returnedObject = $receivedEventObject->setPayload($payloadObject);
        $refReceivedEventObject = new \ReflectionObject($receivedEventObject);
        $payloadProperty = $refReceivedEventObject->getProperty('payload');
        $payloadProperty->setAccessible(true);
        $this->assertInstanceOf(ChannelsList::class, $payloadProperty->getValue($receivedEventObject));
        $this->assertInstanceOf(ReceivedEvent::class, $returnedObject);
    }
    
    /**
     * Test getting payload
     */
    public function testGetPayload()
    {
        $payloadObject = new ChannelsList();
        $receivedEventObject = new ReceivedEvent();
        $refReceivedEventObject = new \ReflectionObject($receivedEventObject);
        $payloadProperty = $refReceivedEventObject->getProperty('payload');
        $payloadProperty->setAccessible(true);
        $payloadProperty->setValue($receivedEventObject, $payloadObject);
        
        $this->assertInstanceOf(ChannelsList::class, $receivedEventObject->getPayload());
    }
}