<?php

namespace SlackPHP\SlackAPI\Models;

use GuzzleHttp\Client;
use Symfony\Component\EventDispatcher\EventDispatcher;
use GuzzleHttp\ClientInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Base transport for Slack API HTTP
 * 
 * @author Zxurian
 * @package SlackAPI
 * @version 0.1
 */
class Transport
{
    /** @var Client */
    static $defaultClient;
    
    /** @var Client */
    private $client;
    
    /** @var EventDispatcher */
    static $defaultEventDispatcher;
    
    /** @var EventDispatcher */
    private $eventDispatcher;
    
    /**
     * Get the Client for use in transport
     * 
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        if ($this->client === null) {
            $this->client = $this->getStaticClient();
        }
        
        return $this->client;
    }
    
    /**
     * Provide a Client for http transport
     * 
     * @param \GuzzleHttp\ClientInterface $client
     * @return $this
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
        
        return $this;
    }
    
    /**
     * Get the client singleton
     * 
     * @return \GuzzleHttp\Client
     */
    private function getStaticClient()
    {
        if (static::$defaultClient === null) {
            static::$defaultClient = new Client();
        }
        
        return static::$defaultClient;
    }
    
    /**
     * Get the Event Dispatcher
     * 
     * @return \Symfony\Component\EventDispatcher\EventDispatcher
     */
    public function getEventDispatcher()
    {
        if ($this->eventDispatcher === null) {
            $this->eventDispatcher = $this->getStaticEventDispatcher();
        }
        
        return $this->eventDispatcher;
    }
    
    /**
     * Set a custom Event Dispatcher
     * 
     * @param EventDispatcherInterface $eventDispatcher
     * @return $this
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
        
        return $this;
    }
    
    /**
     * Get the event disptcher singleton
     * 
     * @return \Symfony\Component\EventDispatcher\EventDispatcher
     */
    private function getStaticEventDispatcher()
    {
        if (static::$defaultEventDispatcher === null) {
            static::$defaultEventDispatcher = new EventDispatcher();
        }
        
        return static::$defaultEventDispatcher;
    }
}