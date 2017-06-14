<?php

namespace SlackPHP\Tests\SlackAPI\Models\Methods;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Methods\AuthRevoke;
/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers AuthRevoke
 */
class AuthRevokeTest extends TestCase
{
    /**
     * Test same model returned from setTest on boolean value in parameter
     */
    public function testSetTestBoolean()
    {
        $boolean = true;
        $authRevoke = new AuthRevoke();
        $return = $authRevoke->setTest($boolean);
        $this->assertInstanceOf(AuthRevoke::class, $return);
    }
    
    /**
     * Test an exception is thrown if not boolean value provided to setTest
     */
    public function testSetTestNotBoolean()
    {
        $authRevoke = new AuthRevoke();
        $this->expectException(\InvalidArgumentException::class);
        $authRevoke->setTest(null);
    }
}