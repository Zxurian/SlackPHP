<?php

namespace SlackPHP\Tests\SlackAPI\Models;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Transport;
use GuzzleHttp\Client;
use SlackPHP\Tests\SlackAPI\TestObjects\MockClient;
use Symfony\Component\EventDispatcher\EventDispatcher;
use SlackPHP\Tests\SlackAPI\TestObjects\MockEventDispatcher;
use JMS\Serializer\Serializer;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers Transport
 */
class TransportTest extends TestCase
{
    /**
     * Test for getting unset client
     */
    public function testGetClient()
    {
        $transport = new Transport();
        $this->assertInstanceOf(Client::class, $transport->getClient());
    }
    
    /**
     * Test for getting set client
     */
    public function testGetSetClient()
    {
        $mockClient = new MockClient();
        $transport = new Transport();
        $refTransport = new \ReflectionObject($transport);
        $clientProperty = $refTransport->getProperty('client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($transport, $mockClient);
        $this->assertSame($mockClient, $transport->getClient());
    }
    
    /**
     * Test for setting client
     */
    public function testSettingClient()
    {
        $mockClient = new MockClient();
        $transport = new Transport();
        $returnObject = $transport->setClient($mockClient);
        $this->assertInstanceOf(Transport::class, $returnObject);
        
        $refTransport = new \ReflectionObject($transport);
        $clientProperty = $refTransport->getProperty('client');
        $clientProperty->setAccessible(true);
        $this->assertSame($mockClient, $clientProperty->getValue($transport));
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
        $returnClient = $getStaticClientMethod->invoke($transport);
        $this->assertInstanceOf(Client::class, $returnClient);
    }
    
    public function testGetStaticClientSingleton()
    {
        $transport = new Transport();
        $refTransport = new \ReflectionObject($transport);
        $getStaticClientMethod = $refTransport->getMethod('getStaticClient');
        $getStaticClientMethod->setAccessible(true);
        
        $client1 = $getStaticClientMethod->invoke($transport);
        $client2 = $getStaticClientMethod->invoke($transport);
        $this->assertSame($client1, $client2);
    }
    
    /**
     * Test for getting unset client
     */
    public function testGetEventDispatcher()
    {
        $transport = new Transport();
        $this->assertInstanceOf(EventDispatcher::class, $transport->getEventDispatcher());
    }
    
    /**
     * Test for getting set client
     */
    public function testGetSetEventDispatcher()
    {
        $mockEventDispatcher = new MockEventDispatcher();
        $transport = new Transport();
        $refTransport = new \ReflectionObject($transport);
        $clientProperty = $refTransport->getProperty('eventDispatcher');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($transport, $mockEventDispatcher);
        $this->assertSame($mockEventDispatcher, $transport->getEventDispatcher());
    }
    
    /**
     * Test for setting client
     */
    public function testSettingEventDispatcher()
    {
        $mockEventDispatcher= new MockEventDispatcher();
        $transport = new Transport();
        $returnObject = $transport->setEventDispatcher($mockEventDispatcher);
        $this->assertInstanceOf(Transport::class, $returnObject);
        
        $refTransport = new \ReflectionObject($transport);
        $eventDispatcher = $refTransport->getProperty('eventDispatcher');
        $eventDispatcher->setAccessible(true);
        $this->assertSame($mockEventDispatcher, $eventDispatcher->getValue($transport));
    }
    
    /**
     * Test for getting staticClient
     */
    public function testGetStaticEventDispatcher()
    {
        $transport = new Transport();
        $refTransport = new \ReflectionObject($transport);
        $getStaticEventDispatcherMethod = $refTransport->getMethod('getEventDispatcher');
        $getStaticEventDispatcherMethod->setAccessible(true);
        $returnEventDispatcher = $getStaticEventDispatcherMethod->invoke($transport);
        $this->assertInstanceOf(EventDispatcher::class, $returnEventDispatcher);
    }
    
    /**
     * Testing DefaultEventDisptacher Singleton
     */
    public function testDefaultEventDispatcherSingleton()
    {
        $transport = new Transport();
        $refTransport = new \ReflectionObject($transport);
        $getStaticEventDispatcherMethod= $refTransport->getMethod('getEventDispatcher');
        $getStaticEventDispatcherMethod->setAccessible(true);
        
        $eventDispatcher1 = $getStaticEventDispatcherMethod->invoke($transport);
        $eventDispatcher2= $getStaticEventDispatcherMethod->invoke($transport);
        $this->assertSame($eventDispatcher1, $eventDispatcher2);
    }
    
    /**
     * Testing getting Serializer
     */
    public function testSerialzer()
    {
        $transport = new Transport();
        $serializer = $transport->getSerializer();
        $this->assertInstanceOf(Serializer::class, $serializer);
        
        $serializer2 = $transport->getSerializer();
        $this->assertSame($serializer, $serializer2);
    }
}