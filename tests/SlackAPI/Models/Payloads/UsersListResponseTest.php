<?php

namespace Tests\SlackAPI\Models\Payloads;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Payloads\UsersListResponse;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers UsersListResponse
 */
class UsersListResponseTest extends TestCase
{
    private $dummyArray = [['id' => '1']];
    
    private $dummyBool = true;
    
    private $dummyString = 'string';
    
    /**
     * Test for getting members
     */
    public function testGetMembers()
    {
        $usersListResponseObject = new UsersListResponse();
        $refUsersListResponseObject = new \ReflectionObject($usersListResponseObject);
        $membersProperty = $refUsersListResponseObject->getProperty('members');
        $membersProperty->setAccessible(true);
        $membersProperty->setValue($usersListResponseObject, $this->dummyArray);
        
        $this->assertEquals($this->dummyArray, $usersListResponseObject->getMembers());
    }
    
    /**
     * Test for getting ok
     */
    public function testGetOk()
    {
        $usersListResponseObject = new UsersListResponse();
        $refUsersListResponseObject = new \ReflectionObject($usersListResponseObject);
        $okProperty = $refUsersListResponseObject->getProperty('ok');
        $okProperty->setAccessible(true);
        $okProperty->setValue($usersListResponseObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $usersListResponseObject->getOk());
    }
    
    
    /**
     * Test for getting error
     */
    public function testGetError()
    {
        $usersListResponseObject = new UsersListResponse();
        $refUsersListResponseObject = new \ReflectionObject($usersListResponseObject);
        $errorProperty = $refUsersListResponseObject->getProperty('error');
        $errorProperty->setAccessible(true);
        $errorProperty->setValue($usersListResponseObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $usersListResponseObject->getError());
    }
}