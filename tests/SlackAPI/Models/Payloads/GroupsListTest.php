<?php

namespace Tests\SlackAPI\Models\Payloads;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Payloads\GroupsList;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers GroupsList
 */
class GroupsListTest extends TestCase
{
    private $dummyBool = true;
    
    /**
     * Test for setting excludeArchived
     */
    public function testSettingExcludeArchived()
    {
        $groupsListObject = new GroupsList();
        $returnedObject = $groupsListObject->setExcludeArchived($this->dummyBool);
        $refGroupsListObject = new \ReflectionObject($groupsListObject);
        $excludeArchivedProperty = $refGroupsListObject->getProperty('excludeArchived');
        $excludeArchivedProperty->setAccessible(true);
        
        $this->assertInstanceOf(GroupsList::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $excludeArchivedProperty->getValue($groupsListObject));
    }
    
    /**
     * Test for setting invalid excludeArchived
     */
    public function testSettingInvalidExcludeArchived()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_BOOLEAN);
        $groupsListObject = new GroupsList();
        $groupsListObject->setExcludeArchived(new \stdClass());
    }
    
    /**
     * Test for getting excludeArchived
     */
    public function testGetExcludeArchived()
    {
        $groupsListObject = new GroupsList();
        $refGroupsListObject = new \ReflectionObject($groupsListObject);
        $excludeArchivedProperty = $refGroupsListObject->getProperty('excludeArchived');
        $excludeArchivedProperty->setAccessible(true);
        $excludeArchivedProperty->setValue($groupsListObject, $this->dummyBool);
        
        $this->assertEquals($this->dummyBool, $groupsListObject->getExcludeArchived());
    }
    
    /**
     * Test for getting response class
     */
    public function testGetResponseClass()
    {
        $groupsListObject = new GroupsList();
    
        $this->assertEquals(get_class($groupsListObject).'Response', $groupsListObject->getResponseClass());
    }
    
    /**
     * Test for getting API method
     */
    public function testGetMethod()
    {
        $groupsListObject = new GroupsList();
    
        $this->assertEquals('groups.list', $groupsListObject->getMethod());
    }
}