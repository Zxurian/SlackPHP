<?php

namespace SlackPHP\Tests\SlackAPI\Models\Methods;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Methods\GroupsMark;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers GroupsMark
 */
class GroupsMarkTest extends TestCase
{
    private $dummyString = 'string';
    
    /**
     * Test for setting channel
     */
    public function testSettingChannel()
    {
        $groupsMark = new GroupsMark();
        $returnedObject = $groupsMark->setChannel($this->dummyString);
        $refGroupsMark = new \ReflectionObject($groupsMark);
        $channelProperty = $refGroupsMark->getProperty('channel');
        $channelProperty->setAccessible(true);
        $this->assertInstanceOf(GroupsMark::class, $returnedObject);
        $this->assertEquals($this->dummyString, $channelProperty->getValue($groupsMark));
    }
    
    /**
     * Test for setting invalid channel
     */
    public function testSettingInvalidChannel()
    {
        $this->expectException(\InvalidArgumentException::class);
        $groupsMark = new GroupsMark();
        $groupsMark->setChannel(null);
    }
    
    /**
     * Test for setting ts
     */
    public function testSettingTs()
    {
        $groupsMark = new GroupsMark();
        $returnedObject = $groupsMark->setTs($this->dummyString);
        $refGroupsMark = new \ReflectionObject($groupsMark);
        $tsProperty = $refGroupsMark->getProperty('ts');
        $tsProperty->setAccessible(true);
        $this->assertInstanceOf(GroupsMark::class, $returnedObject);
        $this->assertEquals($this->dummyString, $tsProperty->getValue($groupsMark));
    }
    
    /**
     * Test for setting invalid ts
     */
    public function testSettingInvalidTs()
    {
        $this->expectException(\InvalidArgumentException::class);
        $groupsMark = new GroupsMark();
        $groupsMark->setTs(null);
    }
    
    /**
     * Test that exception is thrown if channel is not set before validation
     */
    public function testChannelNotSetBeforeValidatePayload()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $groupsMark = new GroupsMark();
        $groupsMark
            ->setTs($this->dummyString)
            ->validatePayload()
        ;
    }
    
    /**
     * Test that exception is thrown if ts property not set before validation
     */
    public function testTsNotSetBeforeValidatePayload()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $groupsMark = new GroupsMark();
        $groupsMark
            ->setChannel($this->dummyString)
            ->validatePayload()
        ;
    }
}