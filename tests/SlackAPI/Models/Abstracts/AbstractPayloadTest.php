<?php

namespace Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Methods\ChatUpdate;
use SlackPHP\SlackAPI\Enumerators\Method;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
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
        $chatUpdateObject->setToken(null);
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
        
        $this->assertEquals(Method::CHAT_UPDATE(), $chatUpdateObject->getMethod());
    }
    
    /**
     * Test that payload is prepared for sending to slack
     */
    public function testPreparePayloadForSlack()
    {
    }
}