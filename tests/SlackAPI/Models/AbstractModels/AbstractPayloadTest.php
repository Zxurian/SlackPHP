<?php

namespace Tests\SlackAPI\Models\AbstractModels;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Payloads\ChatUpdate;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers AbstractPayload
 */
class AbstractPayloadTest extends TestCase
{
    private $dummyString = 'String';
    
    /**
     * Test for setting token
     */
    public function testSettingToken()
    {
        $chatUpdateObject = new ChatUpdate();
        $chatUpdateObject->setToken($this->dummyString);
        $refChatUpdateObject = new \ReflectionObject($chatUpdateObject);
        $tokenProperty = $refChatUpdateObject->getProperty('token');
        $tokenProperty->setAccessible(true);
        
        $this->assertEquals($this->dummyString, $tokenProperty->getValue($chatUpdateObject));
    }

    /**
     * Test for setting invalid token
     */
    public function testSettingInvalidToken()
    {
        $this->expectException(\InvalidArgumentException::class);
        $chatUpdateObject = new ChatUpdate();
        $chatUpdateObject->setToken(new \stdClass());
    }
    
    public function testGetResponseClass()
    {
        $chatUpdateObject = new ChatUpdate();
        
        $this->assertEquals(get_class($chatUpdateObject).'Response', $chatUpdateObject->getResponseClass());
    }
    
    /**
     * Test for getting API method from payload
     */
    public function testGetMethod()
    {
        $chatUpdateObject = new ChatUpdate();
        
        $this->assertEquals(ChatUpdate::method, $chatUpdateObject->getMethod());
    }
    
    /**
     * Test that payload is prepared for sending to slack
     */
    public function testPreparePayloadForSlack()
    {
        $array = [
            'token'         =>  $this->dummyString,
            'ts'            =>  $this->dummyString,
            'channel'       =>  $this->dummyString,
            'text'          =>  $this->dummyString,
            'attachments'   =>  '[]',
        ];
        $chatUpdateObject = new ChatUpdate();
        $chatUpdateObject
            ->setToken($this->dummyString)
            ->setTs($this->dummyString)
            ->setChannel($this->dummyString)
            ->setText($this->dummyString)
        ;
        
        $preparedPayload = $chatUpdateObject->preparePayloadForSlack();
        $this->assertEquals($array, $preparedPayload);
    }
}