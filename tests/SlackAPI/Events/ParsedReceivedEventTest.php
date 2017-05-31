<?php

namespace SlackPHP\Tests\SlackAPI\Events;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Events\ParsedReceivedEvent;
use SlackPHP\SlackAPI\Models\Methods\GroupsListResponse;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ParsedReceivedEvent
 */
class ParsedReceivedEventTest extends TestCase
{
    /** 
     * Test setting payloadResponse
     */
    public function testSettingPayloadResponse()
    {
        $payloadResponse = new GroupsListResponse();
        $parsedReceivedEventObject = new ParsedReceivedEvent();
        $returnedObject = $parsedReceivedEventObject->setPayloadResponse($payloadResponse);
        $refParsedReceivedEventObject = new \ReflectionObject($parsedReceivedEventObject);
        $payloadResponseProperty = $refParsedReceivedEventObject->getProperty('payloadResponse');
        $payloadResponseProperty->setAccessible(true);
        $this->assertInstanceOf(GroupsListResponse::class, $payloadResponseProperty->getValue($parsedReceivedEventObject));
        $this->assertInstanceOf(ParsedReceivedEvent::class, $returnedObject);
    }
    
    /**
     * Test getting payloadResponse
     */
    public function testGetPayloadResponse()
    {
        $payloadResponse = new GroupsListResponse();
        $parsedReceivedEventObject = new ParsedReceivedEvent();
        $refParsedReceivedEventObject = new \ReflectionObject($parsedReceivedEventObject);
        $payloadResponseProperty = $refParsedReceivedEventObject->getProperty('payloadResponse');
        $payloadResponseProperty->setAccessible(true);
        $payloadResponseProperty->setValue($parsedReceivedEventObject, $payloadResponse);
        
        $this->assertInstanceOf(GroupsListResponse::class, $parsedReceivedEventObject->getPayloadResponse());
    }
}