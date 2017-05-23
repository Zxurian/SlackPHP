<?php

namespace Tests\SlackAPI\Models\Methods;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Methods\ChatPostMessageResponse;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ChatPostMessageResponse
 */
class ChatPostMessageResponseTest extends TestCase
{
    private $dummyArray = [['id' => '1']];
    
    private $dummyBool = true;
    
    private $dummyString = 'string';
    
    /**
     * Test for getting ts
     */
    public function testGetTs()
    {
        $chatPostMessageResponseObject = new ChatPostMessageResponse();
        $refChatPostMessageResponseObject = new \ReflectionObject($chatPostMessageResponseObject);
        $tsProperty = $refChatPostMessageResponseObject->getProperty('ts');
        $tsProperty->setAccessible(true);
        $tsProperty->setValue($chatPostMessageResponseObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $chatPostMessageResponseObject->getTs());
    }
    
    /**
     * Test for getting channel
     */
    public function testGetChannel()
    {
        $chatPostMessageResponseObject = new ChatPostMessageResponse();
        $refChatPostMessageResponseObject = new \ReflectionObject($chatPostMessageResponseObject);
        $channelProperty = $refChatPostMessageResponseObject->getProperty('channel');
        $channelProperty->setAccessible(true);
        $channelProperty->setValue($chatPostMessageResponseObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $chatPostMessageResponseObject->getChannel());
    }
    
    /**
     * Test for getting message
     */
    public function testGetMessage()
    {
        $chatPostMessageResponseObject = new ChatPostMessageResponse();
        $refChatPostMessageResponseObject = new \ReflectionObject($chatPostMessageResponseObject);
        $messageProperty = $refChatPostMessageResponseObject->getProperty('message');
        $messageProperty->setAccessible(true);
        $messageProperty->setValue($chatPostMessageResponseObject, $this->dummyArray);
    
        $this->assertEquals($this->dummyArray, $chatPostMessageResponseObject->getMessage());
    }
    
    /**
     * Test for getting ok property
     */
    public function testGetOk()
    {
        $chatPostMessageResponseObject = new ChatPostMessageResponse();
        $refChatPostMessageResponseObject = new \ReflectionObject($chatPostMessageResponseObject);
        $okProperty = $refChatPostMessageResponseObject->getProperty('ok');
        $okProperty->setAccessible(true);
        $okProperty->setValue($chatPostMessageResponseObject, $this->dummyBool);
        
        $this->assertEquals($this->dummyBool, $chatPostMessageResponseObject->getOk());
    }
    
    /**
     * Test for getting error property
     */
    public function testGetError()
    {
        $chatPostMessageResponseObject = new ChatPostMessageResponse();
        $refChatPostMessageResponseObject = new \ReflectionObject($chatPostMessageResponseObject);
        $errorProperty = $refChatPostMessageResponseObject->getProperty('error');
        $errorProperty->setAccessible(true);
        $errorProperty->setValue($chatPostMessageResponseObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $chatPostMessageResponseObject->getError());
    }
}