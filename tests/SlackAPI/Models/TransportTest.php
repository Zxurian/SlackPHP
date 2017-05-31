<?php

namespace SlackPHP\Tests\SlackAPI\Models;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Transport;
use GuzzleHttp\Client;
use SlackPHP\Tests\SlackAPI\TestObjects\MockClient;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers Transport
 */
class TransportTest extends TestCase
{
    
    /**
     * Test for getting guzzle default client
     */
    public function testGetClient()
    {
        $transport = new Transport();
        $this->assertInstanceOf(Client::class, $transport->getClient());
    }
    
    /**
     * Test for getting client other that guzzle
     */
    public function testGetPresetClient()
    {
        $mockClient = new MockClient();
        $transport = new Transport();
        $refTransport = new \ReflectionObject($transport);
        $clientProperty = $refTransport->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($transport, $mockClient);
        $this->assertInstanceOf(MockClient::class, $transport->getClient());
    }
}