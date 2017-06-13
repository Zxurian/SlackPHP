<?php

namespace SlackPHP\Tests\SlackAPI\Enumerators;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Enumerators\Method;

/**
 * @covers Method
 * @author Zxurian
 */
class MethodTest extends TestCase
{
    /**
     * Test method available to app bot, as well as one that's not
     */
    public function testIsAvailableToAppBot()
    {
        $method = Method::API_TEST();
        $this->assertTrue($method->isAvailableToAppBot());
        
        $method = Method::BOTS_INFO();
        $this->assertFalse($method->isAvailableToAppBot());
    }
    
    /**
     * Test method available to custom bot, as well as one that's not
     */
    public function testIsAvailableToCustomBot()
    {
        $method = Method::AUTH_REVOKE();
        $this->assertTrue($method->isAvailableToCustomBot());
        
        $method = Method::BOTS_INFO();
        $this->assertFalse($method->isAvailableToCustomBot());
    }
}