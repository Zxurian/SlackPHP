<?php

namespace SlackPHP\SlackAPI\Main;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Main\SlackAPI;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use GuzzleHttp\ClientInterface;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers SlackAPI
 */
class SlackAPITest extends TestCase
{
    private $dummyString = 'String';

    public function testConstruct()
    {
        $slackAPIObject = new SlackAPI($this->dummyString);
        $refSlackAPIObject = new \ReflectionObject($slackAPIObject);
        $tokenProperty = $refSlackAPIObject->getProperty('token');
        $tokenProperty->setAccessible(true);
        $clientProperty = $refSlackAPIObject->getProperty('client');
        $clientProperty->setAccessible(true);
        $eventDispatcherProperty = $refSlackAPIObject->getProperty('eventDispatcher');
        $eventDispatcherProperty->setAccessible(true);

        $this->assertEquals($this->dummyString, $tokenProperty->getValue($slackAPIObject));
        $this->assertInstanceOf(ClientInterface::class, $clientProperty->getValue($slackAPIObject));
        $this->assertInstanceOf(EventDispatcherInterface::class, $eventDispatcherProperty->getValue($slackAPIObject));
    }
}