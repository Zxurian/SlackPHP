<?php

namespace SlackPHP\Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Methods\ChatUpdate;
use SlackPHP\SlackAPI\Enumerators\Method;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\Tests\SlackAPI\TestObjects\MockPayload;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers AbstractPayload
 */
class AbstractPayloadTest extends TestCase
{
    private $dummyString = 'String';
    
    /**
     * Test for setting token
     */
    public function testSettingToken()
    {
        $mockPayload = new MockPayload();
        $returnedObject = $mockPayload->setToken($this->dummyString);
        $this->assertInstanceOf(MockPayload::class, $returnedObject);
        $refMockPayload = new \ReflectionObject($mockPayload);
        $tokenProperty = $refMockPayload->getProperty('token');
        $tokenProperty->setAccessible(true);
        $this->assertEquals($this->dummyString, $tokenProperty->getValue($mockPayload));
    }

    /**
     * Test for setting invalid token
     */
    public function testSettingInvalidToken()
    {
        $this->expectException(\InvalidArgumentException::class);
        $mockPayloadObject = new MockPayload();
        $mockPayloadObject->setToken(null);
    }
    
    /**
     * Test to get Response class name
     */
    public function testGetResponseClass()
    {
        $mockPayloadObject = new MockPayload();
        
        $this->assertEquals(get_class($mockPayloadObject).'Response', $mockPayloadObject->getResponseClass());
    }
    
    /**
     * Test for getting API method from payload
     */
    public function testGetMethod()
    {
        $mockPayloadObject = new MockPayload();
        
        $this->assertEquals(MockPayload::METHOD, $mockPayloadObject->getMethod());
    }
    
    /**
     * Test for successful validation of model
     */
    public function testSuccessValidateModel()
    {
        $mockAbstractPayload = $this->getMockForAbstractClass(AbstractPayload::class);
        $mockAbstractPayload->expects($this->once())->method('validatePayload')->willReturnSelf();
        $mockAbstractPayload->setToken('111');
        $mockAbstractPayload->validateModel();
        $this->assertTrue(true);
        
    }
    
    /**
     * Test that exception is thrown if token not set before validation
     */
    public function testValidateModelTokenNotSet()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $mockPayloadObject = new MockPayload();
        $mockPayloadObject->validateModel();
    }
}