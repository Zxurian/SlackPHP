<?php

namespace SlackPHP\Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Methods\ChatUpdate;
use SlackPHP\SlackAPI\Enumerators\Method;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\Tests\SlackAPI\TestObjects\MockPayload;

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
        $chatUpdateObject = new ChatUpdate();
        $chatUpdateObject->setToken($this->dummyString);
        $refChatUpdateObject = new \ReflectionObject($chatUpdateObject);
        $tokenProperty = $refChatUpdateObject->getProperty('token');
        $tokenProperty->setAccessible(true);
        
        $this->assertEquals($this->dummyString, $tokenProperty->getValue($chatUpdateObject));
    }

    /**
     * Test for setting invalid token
     */
    public function testSettingInvalidToken()
    {
        $this->expectException(\InvalidArgumentException::class);
        $chatUpdateObject = new ChatUpdate();
        $chatUpdateObject->setToken(null);
    }
    
    public function testGetResponseClass()
    {
        $chatUpdateObject = new ChatUpdate();
        
        $this->assertEquals(get_class($chatUpdateObject).'Response', $chatUpdateObject->getResponseClass());
    }
    
    /**
     * Test for getting API method from payload
     */
    public function testGetMethod()
    {
        $chatUpdateObject = new ChatUpdate();
        
        $this->assertEquals(Method::CHAT_UPDATE(), $chatUpdateObject->getMethod());
    }
    
    /**
     * Test for successful validation of model
     */
    public function testValidateModel()
    {
        $stub = $this->getMockForAbstractClass(AbstractPayload::class);
        $stub->setToken($this->dummyString);
        $stub->validateModel();
        
        $this->assertTrue(true);
    }
    
    /**
     * Test that exception is thrown, if token not set before validateModel method called
     */
    public function testValidateModelTokenNotSet()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $stub = $this->getMockForAbstractClass(AbstractPayload::class);
        $stub->validateModel();
        
    }
    
    /**
     * Test that payload is prepared as single level array for sending to Slack WebAPI
     */
    public function testPreparePayloadForWebAPI()
    {
        $mockAbstractPayload = new MockPayload();
        $mockAbstractPayload->setToken($this->dummyString);
        $returnArray = $mockAbstractPayload->preparePayloadForWebAPI();
//         var_dump($returnArray['parse']);
//         $this->assertEquals(['token' => 'String', 'string' => 'string', 'array' => '["value"]', 'integer' => 1, 'parse' => '{}'], $returnArray);
    }
}