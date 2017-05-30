<?php

namespace Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\SlackAPI;

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
     * Test for sending payload
     */
    public function testSend()
    {
    }
}