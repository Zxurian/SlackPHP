<?php

namespace SlackPHP\Tests\SlackAPI\Models\Methods;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Methods\ChatUpdateResponse;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ChatUpdateResponse
 */
class ChatUpdateResponseTest extends TestCase
{
    private $dummyBool = true;
    
    private $dummyString = 'string';
    
    /**
     * Test for getting ts
     */
    public function testGetTs()
    {
        $chatUpdateResponseObject = new ChatUpdateResponse();
        $refChatUpdateResponseObject = new \ReflectionObject($chatUpdateResponseObject);
        $tsProperty = $refChatUpdateResponseObject->getProperty('ts');
        $tsProperty->setAccessible(true);
        $tsProperty->setValue($chatUpdateResponseObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $chatUpdateResponseObject->getTs());
    }
    
    /**
     * Test for getting channel
     */
    public function testGetChannel()
    {
        $chatUpdateResponseObject = new ChatUpdateResponse();
        $refChatUpdateResponseObject = new \ReflectionObject($chatUpdateResponseObject);
        $channelProperty = $refChatUpdateResponseObject->getProperty('channel');
        $channelProperty->setAccessible(true);
        $channelProperty->setValue($chatUpdateResponseObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $chatUpdateResponseObject->getChannel());
    }
    
    /**
     * Test for getting text
     */
    public function testGetText()
    {
        $chatUpdateResponseObject = new ChatUpdateResponse();
        $refChatUpdateResponseObject = new \ReflectionObject($chatUpdateResponseObject);
        $textProperty = $refChatUpdateResponseObject->getProperty('text');
        $textProperty->setAccessible(true);
        $textProperty->setValue($chatUpdateResponseObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $chatUpdateResponseObject->getText());
    }
    
    /**
     * Test for getting ok
     */
    public function testGetOk()
    {
        $chatUpdateResponseObject = new ChatUpdateResponse();
        $refChatUpdateResponseObject = new \ReflectionObject($chatUpdateResponseObject);
        $okProperty = $refChatUpdateResponseObject->getProperty('ok');
        $okProperty->setAccessible(true);
        $okProperty->setValue($chatUpdateResponseObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $chatUpdateResponseObject->getOk());
    }
    
    /**
     * Test for getting error
     */
    public function testGetError()
    {
        $chatUpdateResponseObject = new ChatUpdateResponse();
        $refChatUpdateResponseObject = new \ReflectionObject($chatUpdateResponseObject);
        $errorProperty = $refChatUpdateResponseObject->getProperty('error');
        $errorProperty->setAccessible(true);
        $errorProperty->setValue($chatUpdateResponseObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $chatUpdateResponseObject->getError());
    }
}