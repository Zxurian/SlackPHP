<?php

namespace Tests\SlackAPI\Models\AbstractModels;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Payloads\ChatUpdate;

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
}