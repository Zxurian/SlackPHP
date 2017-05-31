<?php

namespace SlackPHP\Tests\SlackAPI\Models\Methods;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Methods\GroupsListResponse;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers GroupsListResponse
 */
class GroupsListResponseTest extends TestCase
{
    private $dummyArray = [['id' => '1']];
    
    private $dummyBool = true;
    
    private $dummyString = 'string';
    
    /**
     * Test for getting groups
     */
    public function testGetGroups()
    {
        $groupsListResponseObject = new GroupsListResponse();
        $refGroupsListResponseObject = new \ReflectionClass($groupsListResponseObject);
        $groupsProperty = $refGroupsListResponseObject->getProperty('groups');
        $groupsProperty->setAccessible(true);
        $groupsProperty->setValue($groupsListResponseObject, $this->dummyArray);
        
        $this->assertEquals($this->dummyArray, $groupsListResponseObject->getGroups());
    }
    
    /**
     * Test for getting ok
     */
    public function testGetOk()
    {
        $groupsListResponseObject = new GroupsListResponse();
        $refGroupsListResponseObject = new \ReflectionClass($groupsListResponseObject);
        $okProperty = $refGroupsListResponseObject->getProperty('ok');
        $okProperty->setAccessible(true);
        $okProperty->setValue($groupsListResponseObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $groupsListResponseObject->getOk());
    }
    
    /**
     * Test for getting error
     */
    public function testGetError()
    {
        $groupsListResponseObject = new GroupsListResponse();
        $refGroupsListResponseObject = new \ReflectionClass($groupsListResponseObject);
        $errorProperty = $refGroupsListResponseObject->getProperty('error');
        $errorProperty->setAccessible(true);
        $errorProperty->setValue($groupsListResponseObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $groupsListResponseObject->getError());
    }
}