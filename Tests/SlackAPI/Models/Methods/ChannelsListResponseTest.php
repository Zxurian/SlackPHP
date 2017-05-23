<?php

namespace Tests\SlackAPI\Models\Methods;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Methods\ChannelsListResponse;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ChannelsListResponse
 */
class ChannelsListResponseTest extends TestCase
{
    private $dummyArray = [['id' => '1']];
    
    private $dummyBool = true;
    
    private $dummyString = 'string';
    
    /**
     * Test for getting channels
     */
    public function testGetChannels()
    {
        $channelsListResponseObject = new ChannelsListResponse();
        $refChannelsListResponseObject = new \ReflectionObject($channelsListResponseObject);
        $channelsProperty = $refChannelsListResponseObject->getProperty('channels');
        $channelsProperty->setAccessible(true);
        $channelsProperty->setValue($channelsListResponseObject, $this->dummyArray);
        
        $this->assertEquals($this->dummyArray, $channelsListResponseObject->getChannels());
    }
    
    /**
     * Test for getting ok property
     */
    public function testGetOk()
    {
        $channelsListResponseObject = new ChannelsListResponse();
        $refChannelsListResponseObject = new \ReflectionObject($channelsListResponseObject);
        $okProperty = $refChannelsListResponseObject->getProperty('ok');
        $okProperty->setAccessible(true);
        $okProperty->setValue($channelsListResponseObject, $this->dummyBool);
        
        $this->assertEquals($this->dummyBool, $channelsListResponseObject->getOk());
    }
    
    /**
     * Test for getting error property
     */
    public function testGetError()
    {
        $channelsListResponseObject = new ChannelsListResponse();
        $refChannelsListResponseObject = new \ReflectionObject($channelsListResponseObject);
        $errorProperty = $refChannelsListResponseObject->getProperty('error');
        $errorProperty->setAccessible(true);
        $errorProperty->setValue($channelsListResponseObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $channelsListResponseObject->getError());
    }
}