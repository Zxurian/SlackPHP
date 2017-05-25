<?php

namespace SlackPHP\SlackAPI;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use GuzzleHttp\ClientInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use SlackPHP\SlackAPI\Events\RequestEvent;
use GuzzleHttp\Psr7\Request;
use SlackPHP\SlackAPI\Events\ReceivedEvent;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Events\ParsedReceivedEvent;
use GuzzleHttp\Client;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class where the creayion of Slack API objects is done
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class SlackAPI
{
    /**
     * @var string|null
     */
    protected $token;
    
    /**
     * @var ClientInterface
     */
    protected $client;
    
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;
    
    const defaultEndpoint = 'https://slack.com/api/';
    
    /**
     * @param string $applicationToken
     * @throws SlackException
     */
    public function __construct($applicationToken = null)
    {
        if ($applicationToken !== null) {
            if (!is_scalar($applicationToken)) {
                throw new \InvalidArgumentException('Token should be scalar type');
            }
            $this->token = (string)$applicationToken;
        }
    }
    
    /**
     * Getter for client
     *
     * @return ClientInterface
     */
    public function getClient()
    {
        if ($this->client === null) {
            $this->client = new Client();
        }
        
        return $this->client;
    }
    
    /**
     * Getter for eventDispatcher
     *
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher()
    {
        if ($this->eventDispatcher === null) {
            $this->eventDispatcher = new EventDispatcher();
        }
        
        return $this->eventDispatcher;
    }
    
    /**
     * Setter for client
     * 
     * @param ClientInterface $client
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
    }
    
    /**
     * Setter for eventDispatcher
     * 
     *  @param EventDispatcherInterface $eventDispatcher
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
    
    /**
     * Creates an instance of AppBot class
     * 
     * @param string $botToken
     * @return AppBot
     */
    public function createAppBot($botToken)
    {
        $appBot = new AppBot($this);
        $appBot->setBotToken($botToken);
        
        return $appBot;
    }
    
    /**
     * Send payload to Slack API
     *
     * @param AbstractPayload $payload Payload to send
     * @param string $endpoint
     * @return AbstractPayloadResponse
     */
    public function send(AbstractPayload $payload, $endpoint = null)
    {
        if ($payload->getToken() === null) {
            $payload->setToken($this->token);
        }
        
        $preparedPayload = $payload->preparePayloadForSlack();
        
        $requestEvent = new RequestEvent();
        $requestEvent
            ->setPayload($payload)
            ->setPreparedPayload($preparedPayload)
        ;
        $this->getEventDispatcher()->dispatch(RequestEvent::EVENT_NAME, $requestEvent);
        $request = new Request(
            'POST',
            ($endpoint !== null ? $endpoint : self::defaultEndpoint) . $payload->getMethod(),
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            http_build_query($preparedPayload)
        );
        $response = $this->getClient()->send($request);
        
        $receivedEvent = new ReceivedEvent();
        $receivedEvent
            ->setPayload($payload)
            ->setResponse($response)
        ;
        $this->getEventDispatcher()->dispatch(ReceivedEvent::EVENT_NAME, $receivedEvent);
        
        if ($response->getStatusCode() != 200) {
            throw new SlackException('Received status code should be 200, received: '.$response->getStatusCode(), SlackException::NOT_200_FROM_SLACK_SERVER);
        }
        
        $responseClassName = $payload->getResponseClass();
        $payloadResponse = $responseClassName::parseResponse($response->getBody()->getContents());
        $parsedReceivedEvent = new ParsedReceivedEvent();
        $parsedReceivedEvent
            ->setPayload($payload)
            ->setPayloadResponse($payloadResponse)
        ;
        $this->getEventDispatcher()->dispatch(ParsedReceivedEvent::EVENT_NAME, $parsedReceivedEvent);
        
        return $payloadResponse;
    }
}