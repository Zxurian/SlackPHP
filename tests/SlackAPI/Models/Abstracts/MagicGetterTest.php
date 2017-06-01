<?php

namespace SlackPHP\Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Methods\ChatUpdate;
use SlackPHP\Tests\SlackAPI\TestObjects\MockMagicGetter;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers MagicGetter
 */
class MagicGetterTest extends TestCase
{
    private $dummyString = 'String';
    
    /**
     * Test for magic call method for getters, getting preset value
     */
    public function testSettingToken()
    {
        $chatUpdateObject = new ChatUpdate();
        $refChatUpdateObject = new \ReflectionObject($chatUpdateObject);
        $tokenProperty = $refChatUpdateObject->getProperty('token');
        $tokenProperty->setAccessible(true);
        $tokenProperty->setValue($chatUpdateObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $chatUpdateObject->getToken());
    }
    
    /**
     * Test that exception is thrown if getter called on undefined property
     */
    public function testGetUndefined()
    {
        $this->expectException(\ErrorException::class);
        $mockMagicGetter = new MockMagicGetter();
        $mockMagicGetter->getUndefined();
    }
    
    public function testCallUndefined()
    {
        $this->expectException('PHPUnit_Framework_Error');
        $mockMagicGetter = new MockMagicGetter();
        $this->assertFalse($mockMagicGetter->undefined());
        
    }
}