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
        
        $Serializer = $this->createMock(Serializer::class);
        $Serializer
            ->expects($this->any())
            ->method('toArray')
            ->with($this->any())
            ->will($this->returnValue($mockArray))
        ;
        
        $SlackAPI = $this->createMock(SlackAPI::class);
        $SlackAPI
            ->expects($this->any())
            ->method('getSerializer')
            ->will($this->returnValue($Serializer))
        ;
        
        $convertedArray = $SlackAPI->convertToWebAPIArray($mockPayload);
        var_dump($convertedArray);
        
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
    }
}