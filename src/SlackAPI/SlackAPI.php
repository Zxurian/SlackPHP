<?php

namespace SlackPHP\SlackAPI;

use GuzzleHttp\Psr7\Request;
use SlackPHP\SlackAPI\Events;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Exceptions\WebAPIException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Models\Transport;

/**
 * Main class for sending and processing Slack requests
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.3
 * 
 * @method string getToken()
 */
class SlackAPI extends Transport
{
    /** @var string */
    protected $token;
    
    const WEB_API_ENDPOINT = 'https://slack.com/api/';
    
    /**
     * Provide your Application OAuth token
     * 
     * @param string $applicationToken
     * @throws \InvalidArgumentException
     */
    public function __construct($applicationToken)
    {
        if (!is_scalar($applicationToken)) {
            throw new \InvalidArgumentException('Token should be scalar');
        }
        
        $this->token = (string)$applicationToken;
    }
    
    /**
     * Convert the payload to a single level array for use with http_query_vars
     * Lower level arrays will be converted to JSON
     *
     * @return string
     */
    public function convertToWebAPIArray(AbstractPayload $payload)
    {
        $arrayPayload = $this->getSerializer()->toArray($payload);
        foreach($arrayPayload as $key => $value) {
            if (is_array($value)) {
                $arrayPayload[$key] = json_encode($value);
            }
        }
        
        return $arrayPayload;
    }
    
    /**
     * Send payload to Slack API
     *
     * @param AbstractPayload $payload Payload to send
     * @return AbstractPayloadResponse
     */
    public function send(AbstractPayload $payload)
    {
        // If there's no token on the payload, use the Application token
        if ($payload->getToken() === null) {
            $payload->setToken($this->token);
        }
        
        // Validate the payload to make sure all required fields are filled
        $payload->validatePayload();
        
        // Get an array of parameters from the payload
        $preparedPayload = $this->convertToWebAPIArray($payload);
        
        // Trigger an event for the Request
        $requestEvent = new Events\RequestEvent();
        $requestEvent
            ->setPayload($payload)
            ->setPreparedPayload($preparedPayload)
        ;
        $this->getEventDispatcher()->dispatch(Events\RequestEvent::EVENT_NAME, $requestEvent);
        
        // Send the request to slack
        $request = new Request(
            'POST',
            self::WEB_API_ENDPOINT . $payload->getMethod(),
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            http_build_query($preparedPayload)
        );
        $response = $this->getClient()->send($request);
        
        // Trigger an event for the Response
        $receivedEvent = new Events\ReceivedEvent();
        $receivedEvent
            ->setPayload($payload)
            ->setResponse($response)
        ;
        $this->getEventDispatcher()->dispatch(Events\ReceivedEvent::EVENT_NAME, $receivedEvent);
        
        if ($response->getStatusCode() != 200) {
            throw new SlackException($response->getStatusCode().' received from server', SlackException::NOT_200_FROM_SLACK_SERVER);
        }
        
        // Populate the response model
        $responseClassName = $payload->getResponseClass();
        $payloadResponse = $responseClassName::parseResponse($response->getBody()->getContents());
        
        // Trigger an event for the Parse
        $parsedReceivedEvent = new Events\ParsedReceivedEvent();
        $parsedReceivedEvent
            ->setPayload($payload)
            ->setPayloadResponse($payloadResponse)
        ;
        $this->getEventDispatcher()->dispatch(Events\ParsedReceivedEvent::EVENT_NAME, $parsedReceivedEvent);
        
        if (!$payloadResponse->getOk()) {
            throw new WebAPIException($payloadResponse->getError());
        }
        
        if ($payloadResponse->getWarning() !== null) {
            trigger_error('Slack warning: '.$payloadResponse->getWarning(), E_USER_WARNING);
        }
        
        return $payloadResponse;
    }
}