<?php

namespace Tests\SlackAPI\Events;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Events\RequestEvent;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers RequestEvent
 */
class RequestEventTest extends TestCase
{
    private $dummyArray = ['token' => 'token'];
    
    /**
     * Testing setting preparedPayload
     */
    public function testSettingPreparedPayload()
    {
        $requestEventObject = new RequestEvent();
        $returnedObject = $requestEventObject->setPreparedPayload($this->dummyArray);
        $refRequesteventObject = new \ReflectionObject($requestEventObject);
        $preparedPayloadProperty = $refRequesteventObject->getProperty('preparedPayload');
        $preparedPayloadProperty->setAccessible(true);
        $this->assertEquals($this->dummyArray, $preparedPayloadProperty->getValue($requestEventObject));
        $this->assertInstanceOf(RequestEvent::class, $returnedObject);
    }
    
    /**
     * Test getting preparedPayload
     */
    public function testGetPreparedPayload()
    {
        $requestEventObject = new RequestEvent();
        $refRequesteventObject = new \ReflectionObject($requestEventObject);
        $preparedPayloadProperty = $refRequesteventObject->getProperty('preparedPayload');
        $preparedPayloadProperty->setAccessible(true);
        $preparedPayloadProperty->setValue($requestEventObject, $this->dummyArray);
        
        $this->assertEquals($this->dummyArray, $requestEventObject->getPreparedPayload());
        
    }
    
}