<?php

namespace SlackPHP\SlackAPI;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class where the calls with WebAPI are executed from
 * Provide payload to send method for sending it to Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class WebAPI extends SlackAPI
{
    /**
     * @var string|NULL
     */
    protected $token = null;
    
    /**
     * @param string|null $token
     * @param ClientInterface|null $client
     * @param EventDispatcherInterface|null $eventDispatcher
     */
    protected function __construct($token = null, ClientInterface $client = null, EventDispatcherInterface $eventDispatcher = null) 
    {
        if (!is_scalar($token) && $token === null) {
            throw new SlackException('Token should be scalar type', SlackException::NOT_SCALAR);
        } else {
            $this->token = (string)$token;
        }
        
        if ($client === null) {
            $this->client = new Client();
        } else {
            $this->client = $client;
        }
        
        if ($eventDispatcher === null) {
            $this->eventDispatcher = new EventDispatcher();
        } else {
            $this->eventDispatcher = $eventDispatcher;
        }
    }
}