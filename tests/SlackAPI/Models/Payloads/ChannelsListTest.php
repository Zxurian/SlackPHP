<?php

namespace Tests\SlackAPI\Models\Payloads;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Payloads\ChannelsList;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ChannelList
 */
class ChannelsListTest extends TestCase
{
    public $dummyBool = true;
    
    /**
     * Test for setting excludeArchived property
     */
    public function testSettingExcludeArchived()
    {
        $channelsListObject = new ChannelsList();
        $returnedObject = $channelsListObject->setExcludeArchived($this->dummyBool);
        $refChannelsListObject = new \ReflectionObject($channelsListObject);
        $excludeArchivedProperty = $refChannelsListObject->getProperty('excludeArchived');
        $excludeArchivedProperty->setAccessible(true);
        
        $this->assertInstanceOf(ChannelsList::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $excludeArchivedProperty->getValue($channelsListObject));
    }
    
    /**
     * Test for setting invalid excludeArchived property
     */
    public function testSettingInvalidExcludeArchived()
    {
        $this->expectException(\InvalidArgumentException::class);
        $channelsListObject = new ChannelsList();
        $channelsListObject->setExcludeArchived(new \stdClass());
    }
    
    /**
     * Test for getting excludeArchived property
     */
    public function testGetExcludeArchived()
    {
        $channelsListObject = new ChannelsList();
        $refChannelsListObject = new \ReflectionObject($channelsListObject);
        $excludeArchivedProperty = $refChannelsListObject->getProperty('excludeArchived');
        $excludeArchivedProperty->setAccessible(true);
        $excludeArchivedProperty->setValue($channelsListObject, $this->dummyBool);
        
        $this->assertEquals($this->dummyBool, $channelsListObject->getExcludeArchived($channelsListObject));
    }
    
    /**
     * Test for setting excludeMembers property
     */
    public function testSettingExcludeMembers()
    {
        $channelsListObject = new ChannelsList();
        $returnedObject = $channelsListObject->setExcludeMembers($this->dummyBool);
        $refChannelsListObject = new \ReflectionObject($channelsListObject);
        $excludeMembersProperty = $refChannelsListObject->getProperty('excludeMembers');
        $excludeMembersProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChannelsList::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $excludeMembersProperty->getValue($channelsListObject));
    }
    
    /**
     * Test for setting invalid excludeMembers property
     */
    public function testSettingInvalidExcludeMembers()
    {
        $this->expectException(\InvalidArgumentException::class);
        $channelsListObject = new ChannelsList();
        $channelsListObject->setExcludeMembers(new \stdClass());
    }
    
    /**
     * Test for getting excludeMembers property
     */
    public function testGetExcludeMembers()
    {
        $channelsListObject = new ChannelsList();
        $refChannelsListObject = new \ReflectionObject($channelsListObject);
        $excludeMembersProperty = $refChannelsListObject->getProperty('excludeMembers');
        $excludeMembersProperty->setAccessible(true);
        $excludeMembersProperty->setValue($channelsListObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $channelsListObject->getExcludeMembers($channelsListObject));
    }
    
    /**
     * Test for getting response class
     */
    public function testGetResponseClass()
    {
        $channelsListObject = new ChannelsList();
        
        $this->assertEquals(get_class($channelsListObject).'Response', $channelsListObject->getResponseClass());
    }
    
    /**
     * Test for getting API method
     */
    public function testGetMethod()
    {
        $channelsListObject = new ChannelsList();
        
        $this->assertEquals('channels.list', $channelsListObject->getMethod());
    }
}