<?php

namespace SlackPHP\Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\SlackAPI;
use SlackPHP\Tests\SlackAPI\TestObjects\MockPayload;
use JMS\Serializer\Serializer;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers SlackAPI
 */
class SlackAPITest extends TestCase
{
    private $oAuthToken = 'xoxp-00000000000-00000000000-000000000000-00000000000000000000000000000000';

    /**
     * Test creating class
     */
    public function testConstruct()
    {
        $slackAPI = new SlackAPI($this->oAuthToken);

        $this->assertInstanceOf(SlackAPI::class, $slackAPI);
    }
    
    /**
     * Test for providing invalid token in construct
     */
    public function testInvalidTokenToConstruct()
    {
        $this->expectException(\InvalidArgumentException::class);
        $slackAPIObject = new SlackAPI(null);
    }
    
    /**
     * Test converting to web API
     */
    public function testConvertToWebAPIArray()
    {
        $mockPayload = new MockPayload();
        $mockArray = [ 'a' => 1, 'b' => 'test', 'c' => [ 'x' => 'foo', 'y' => 123, 'z' => 'bar']];
        
        $Serializer = $this->createMock(Serializer::Class);
        $Serializer
            ->expects($this->any())
            ->method('toArray')
            ->will($this->returnValue($mockArray))
        ;
        
        $SlackAPI = $this->getMockBuilder(SlackAPI::class)
            ->setConstructorArgs([ $this->oAuthToken ])
            ->setMethods(['getSerializer'])
            ->getMock();
        $SlackAPI
            ->expects($this->any())
            ->method('getSerializer')
            ->will($this->returnValue($Serializer))
        ;
        
        $convertedArray = $SlackAPI->convertToWebAPIArray($mockPayload);
        
        $expectedArray = [
            'a' => 1,
            'b' => 'test',
            'c' => '{"x":"foo","y":123,"z":"bar"}',
        ];
        $this->assertEquals($expectedArray, $convertedArray);
        
    }
    
    /**
     * Test for sending payload
     */
    public function testSend()
    {
        $expectedArray = [
            'a' => 1,
            'b' => 'test',
            'c' => '{"x":"foo","y":123,"z":"bar"}',
        ];
        $mockPayload = $this->getMockBuilder(MockPayload::class)
            ->setMethods([
                'getToken',
                'setToken',
                'validatePayload',
                'getMethod',
                'getResponseClass',
            ])
            ->getMock()
        ;
        $refMockPayload = new \ReflectionObject($mockPayload);
        $tokenProperty = $refMockPayload->getProperty('token');
        $tokenProperty->setAccessible(true);
        $tokenProperty->setValue($mockPayload, $this->oAuthToken);
        $mockPayload
            ->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue(null))
        ;
        $mockPayload
            ->expects($this->any())
            ->method('setToken')
            ->will($this->returnValue(true))
        ;
        $mockPayload
            ->expects($this->any())
            ->method('validatePayload')
            ->will($this->returnValue(true))
        ;
        $mockPayload
            ->expects($this->any())
            ->method('getMethod')
            ->will($this->returnValue('method'))
        ;
        $mockPayload
            ->expects($this->any())
            ->method('getResponseClass')
            ->will($this->returnValue('MockPayloadResponse'))
        ;
        
        $mockSlackAPI = $this->getMockBuilder(SlackAPI::class)
            ->setConstructorArgs([$this->oAuthToken])
            ->setMethods(['convertToWebAPIArray', 'getEventDispatcher', 'getClient'])
            ->getMock()
        ;
        $mockSlackAPI
            ->expects($this->any())
            ->method('convertToWebAPIArray')
            ->will($this->returnValue($expectedArray))
        ;
    }
}