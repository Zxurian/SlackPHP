<?php

namespace SlackPHP\Tests\SlackAPI\Models;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Transport;
use GuzzleHttp\Client;
use SlackPHP\Tests\SlackAPI\TestObjects\MockClient;
use Symfony\Component\EventDispatcher\EventDispatcher;
use SlackPHP\Tests\SlackAPI\TestObjects\MockEventDispatcher;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers Transport
 */
class TransportTest extends TestCase
{
    
    /**
     * Test for getting default client
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
    
    /**
     * Test for setting client
     */
    public function testSettingClient()
    {
        $mockClient = new MockClient();
        $transport = new Transport();
        $returnObject = $transport->setClient($mockClient);
        $refTransport = new \ReflectionObject($transport);
        $clientProperty = $refTransport->getProperty('client');
        $clientProperty->setAccessible(true);
        $this->assertInstanceOf(MockClient::class, $clientProperty->getValue($transport));
        $this->assertInstanceOf(Transport::class, $returnObject);
    }
    
    /**
     * Test for getting staticClient
     */
    public function testGetStaticClient()
    {
        $transport = new Transport();
        $refTransport = new \ReflectionObject($transport);
        $getStaticClientMethod = $refTransport->getMethod('getStaticClient');
        $getStaticClientMethod->setAccessible(true);
        $returnClient = $getStaticClientMethod->invokeArgs($transport, []);
        $clientProperty = $refTransport->getProperty('defaultClient');
        $clientProperty->setAccessible(true);
        $this->assertInstanceOf(Client::class, $clientProperty->getValue($transport));
        $this->assertInstanceOf(Client::class, $returnClient);
    }
    
    /**
     * Test for getting eventDispatcher
     */
    public function testGetEventDispatcher()
    {
        $transport = new Transport();
        $this->assertInstanceOf(EventDispatcher::class, $transport->getEventDispatcher());
    }
    
    /**
     * Test for getting preset eventDispatcher
     */
    public function testGetPresetEventDispatcher()
    {
        $transport = new Transport();
        $mockEventDispatcher = new MockEventDispatcher();
        $refTransport = new \ReflectionObject($transport);
        $eventDispatcherProperty = $refTransport->getProperty('eventDispatcher');
        $eventDispatcherProperty->setAccessible(true);
        $eventDispatcherProperty->setValue($transport, $mockEventDispatcher);
        $this->assertInstanceOf(MockEventDispatcher::class, $transport->getEventDispatcher());
    }
    
    /**
     * Tests for setting eventDispatcher
     */
    public function testSettingEventDispatcher()
    {
        $transport = new Transport();
        $mockEventDispatcher = new MockEventDispatcher();
        $returnObject = $transport->setEventDispatcher($mockEventDispatcher);
        $refTransport = new \ReflectionObject($transport);
        $eventDispatcherProperty = $refTransport->getProperty('eventDispatcher');
        $eventDispatcherProperty->setAccessible(true);
        $this->assertInstanceOf(MockEventDispatcher::class, $eventDispatcherProperty->getValue($transport));
        $this->assertInstanceOf(Transport::class, $returnObject);
    }
    
    /**
     * Test for getting staticEventDispatcher
     */
    public function testGetStaticeventDispatcher()
    {
        $transport = new Transport();
        $refTransport = new \ReflectionObject($transport);
        $getStaticEventDispatcherMethod = $refTransport->getMethod('getStaticEventDispatcher');
        $getStaticEventDispatcherMethod->setAccessible(true);
        $returnEventDispatcher = $getStaticEventDispatcherMethod->invokeArgs($transport, []);
        $defaultEventDispatcherProperty = $refTransport->getProperty('defaultEventDispatcher');
        $defaultEventDispatcherProperty->setAccessible(true);
        $this->assertInstanceOf(EventDispatcher::class, $returnEventDispatcher);
        $this->assertInstanceOf(EventDispatcher::class, $defaultEventDispatcherProperty->getValue($transport));
    }
}