<?php

namespace SlackPHP\SlackAPI;

use SlackPHP\SlackAPI\Models\Transport;
use SlackPHP\SlackAPI\Models\MessageParts\Message;
use GuzzleHttp\Psr7\Request;
use SlackPHP\SlackAPI\Events;
use SlackPHP\SlackAPI\Exceptions\WebhookException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\BadResponseException;

/**
 * Class for handling Incoming Webhook Messages
 * 
 * @author Zxurian
 * @see https://api.slack.com/incoming-webhooks
 * @package SlackAPI
 * @version 0.1
 *
 */
class Webhook extends Transport
{
    /** @var string */
    private $webhookUrl;
    
    /**
     * Provide the Incoming Webhook URL
     * 
     * @param string $webhookUrl
     * @throws \InvalidArgumentException
     */
    public function __construct($webhookUrl)
    {
        if (!is_scalar($webhookUrl) || !filter_var($webhookUrl, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Must provide a valid URL');
        }
        
        $this->webhookUrl = $webhookUrl;
    }
    
    /**
     * Send a message to the incoming webhook
     * 
     * @param Message $message
     * @return array
     */
    public function send(Message $message)
    {
        // Get an array of parameters from the payload
        $jsonPayload = $this->getSerializer()->serialize($message, 'json');
        
        // Trigger an event for the Request
        $requestEvent = new Events\RequestEvent();
        $requestEvent
            ->setPayload($message)
            ->setPreparedPayload($jsonPayload)
        ;
        $this->getEventDispatcher()->dispatch(Events\RequestEvent::EVENT_NAME, $requestEvent);
        
        // Send the request to slack
        $request = new Request(
            'POST',
            $this->webhookUrl,
            ['Content-Type' => 'application/json'],
            $jsonPayload
        );
        
        try {
            $response = $this->getClient()->send($request);
        } catch (BadResponseException $e) {
            $webhookException = new WebhookException('Bad Resposne from Slack. See getGuzzleHttp() for more info.', WebhookException::BAD_RESPONSE);
            $webhookException->setGuzzleException($e);
            throw $webhookException;
        } catch (RequestException $e) {
            $webhookException = new WebhookException('Error when trying to send request. See getGuzzleException() for more info.', WebhookException::CONNECTION_ERROR);
            $webhookException->setGuzzleException($e);
            throw $webhookException;
        }
        
        // Trigger an event for the Response
        $receivedEvent = new Events\ReceivedEvent();
        $receivedEvent
            ->setPayload($message)
            ->setResponse($response)
        ;
        $this->getEventDispatcher()->dispatch(Events\ReceivedEvent::EVENT_NAME, $receivedEvent);
        
        return $response->getBody()->getContents();
    }
}