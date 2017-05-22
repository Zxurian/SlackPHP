<?php

namespace Tests\SlackAPI\Models\Payloads;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Payloads\UsersList;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers UsersList
 */
class UsersListTest extends TestCase
{
    private $dummyBool = true;
    
    /**
     * Test for setting presence
     */
    public function testSettingPresence()
    {
        $usersListObject = new UsersList();
        $returnedObject = $usersListObject->setPresence($this->dummyBool);
        $refUsersListObject = new \ReflectionObject($usersListObject);
        $presenceProperty = $refUsersListObject->getProperty('presence');
        $presenceProperty->setAccessible(true);
        
        $this->assertInstanceOf(UsersList::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $presenceProperty->getValue($usersListObject));
    }
    
    /**
     * Test for setting invalid presence
     */
    public function testSettingInvalidPresence()
    {
        $this->expectException(\InvalidArgumentException::class);
        $usersListObject = new UsersList();
        $usersListObject->setPresence(new \stdClass());
    }
    
    /**
     * Test for getting presence
     */
    public function testGetPresence()
    {
        $usersListObject = new UsersList();
        $refUsersListObject = new \ReflectionObject($usersListObject);
        $presenceProperty = $refUsersListObject->getProperty('presence');
        $presenceProperty->setAccessible(true);
        $presenceProperty->setValue($usersListObject, $this->dummyBool);
    }
    
    /**
     * Test for getting response class
     */
    public function testGetResponseClass()
    {
        $usersListObject = new UsersList();
    
        $this->assertEquals(get_class($usersListObject).'Response', $usersListObject->getResponseClass());
    }
    
    /**
     * Test for getting API method
     */
    public function testGetMethod()
    {
        $usersListObject = new UsersList();
    
        $this->assertEquals('users.list', $usersListObject->getMethod());
    }
}