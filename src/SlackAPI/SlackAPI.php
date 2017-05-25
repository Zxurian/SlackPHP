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
     * @var ClientInterface|NULL
     */
    protected static $client = null;
    
    /**
     * @var EventDispatcherInterface|NULL
     */
    protected static $eventDispatcher = null;
    
    /**
     * Base URL for Slack API
     */
    const API_URL = 'https://slack.com/api/';
    
    /**
     * Send payload to Slack API
     *
     * @param AbstractPayload $payload Payload to send
     * @return AbstractPayloadResponse
     */
    public function send(AbstractPayload $payload)
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
        
        self::$eventDispatcher->dispatch(RequestEvent::EVENT_NAME, $requestEvent);
        $request = new Request(
            'POST',
            self::API_URL . $payload->getMethod(),
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            http_build_query($preparedPayload)
        );
        $response = self::$client->send($request);
        
        $receivedEvent = new ReceivedEvent();
        $receivedEvent
            ->setPayload($payload)
            ->setResponse($response)
        ;
        self::$eventDispatcher->dispatch(ReceivedEvent::EVENT_NAME, $receivedEvent);
        
        if ($response->getStatusCode() != 200) {
            throw new SlackException('Received status code should be 200, received: '.$response->getStatusCode(), SlackException::NOT_200_FROM_SLACK_SERVER);
        }
        
        $responseClassName = $payload->getResponseClass();
        $payloadResponseObject = $responseClassName::parseResponse($response->getBody()->getContents());
        $parsedReceivedEvent = new ParsedReceivedEvent();
        $parsedReceivedEvent
            ->setPayload($payload)
            ->setPayloadResponse($payloadResponseObject)
        ;
        self::$eventDispatcher->dispatch(ParsedReceivedEvent::EVENT_NAME, $parsedReceivedEvent);
        
        return $payloadResponseObject;
    }
    
    public static function __callstatic($className, $arguments)
    {
        if (substr($className, 0, 6) == 'create') {
            $className = 'SlackPHP\\SlackAPI\\'.substr($className, 6);
            
            if (!class_exists($className)) {
                throw new \ErrorException('Can’t create instance of '.$className);
            }
            
            foreach ($arguments as $key => $argument) {
                if ($argument instanceof ClientInterface) {
                    self::$client = $argument;
                }
                
                if ($argument instanceof EventDispatcherInterface) {
                    self::$eventDispatcher = $argument;
                }
            }
            
            if (self::$client === null) {
                self::$client = new Client();
            }
            
            if (self::$eventDispatcher === null) {
                self::$eventDispatcher = new EventDispatcher();
            }
            
            $apiObject = new $className(...$arguments);
            
            return $apiObject;
        }
        
        trigger_error('Fatal error: Incorrect static call');
    }
}