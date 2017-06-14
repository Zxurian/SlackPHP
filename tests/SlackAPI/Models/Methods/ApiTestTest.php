<?php

namespace SlackPHP\Tests\SlackAPI\Models\Methods;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Methods\ApiTest;
/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ApiTest
 */
class ApiTestTest extends TestCase
{
    /**
     * Test setError with scalar value
     */
    public function testSetErrorScalar()
    {
        $scalar = 'string';
        $apiTest = new ApiTest();
        $return = $apiTest->setError($scalar);
        $this->assertInstanceOf(ApiTest::class, $return);
    }
    
    /**
     * Test an exception is thrown if not scalar value provided to setError
     */
    public function testSetErrorNotScalar()
    {
        $notScalar = [];
        $apiTest = new ApiTest();
        $this->expectException(\InvalidArgumentException::class);
        $apiTest->setError($notScalar);
    }
    
    /**
     * Test setFoo with scalar value
     */
    public function testSetFooScalar()
    {
        $scalar = 'string';
        $apiTest = new ApiTest();
        $return = $apiTest->setFoo($scalar);
        $this->assertInstanceOf(ApiTest::class, $return);
    }
    
    /**
     * Test an exception is thrown if not scalar value provided to setFoo
     */
    public function testSetFooNotScalar()
    {
        $notScalar = [];
        $apiTest = new ApiTest();
        $this->expectException(\InvalidArgumentException::class);
        $apiTest->setFoo($notScalar);
    }
}