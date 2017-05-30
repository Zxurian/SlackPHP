<?php

namespace Tests\SlackAPI;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\SlackAPI;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use SlackPHP\SlackAPI\Models\Methods\GroupsList;
use SlackPHP\SlackAPI\Models\Methods\GroupsListResponse;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use Symfony\Component\EventDispatcher\EventDispatcher;
use SlackPHP\SlackAPI\AppBot;
use SlackPHP\SlackAPI\Models\Methods\GroupsMark;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers SlackAPI
 */
class SlackAPITest extends TestCase
{
    private $oAuthToken = 'xoxp-00000000000-00000000000-000000000000-00000000000000000000000000000000';

    /**
     * Test, that all the initial properties can be set for SlackAPI in constructor
     */
    public function testConstruct()
    {
        $slackAPIObject = new SlackAPI($this->oAuthToken);
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $tokenProperty = $refSlackAPIObject->getProperty('token');
        $tokenProperty->setAccessible(true);

        $this->assertEquals($this->oAuthToken, $tokenProperty->getValue($slackAPIObject));
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
    
    /**
     * Test that exception is thrown if Slack API responded with other that 200 code
     */
    public function testInvalidResponseCodeOnSend()
    {
    }
}