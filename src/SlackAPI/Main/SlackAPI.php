<?php

namespace SlackPHP\SlackAPI\Main;

use SlackPHP\SlackAPI\Interfaces\SlackAPIInterface;
use SlackPHP\SlackAPI\Interfaces\PayloadInterface;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use GuzzleHttp\ClientInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use SlackPHP\SlackAPI\Processors\PayloadProcessor;
use SlackPHP\SlackAPI\Processors\PayloadResponseProcessor;
use GuzzleHttp\Client;
use Symfony\Component\EventDispatcher\EventDispatcher;
use SlackPHP\SlackAPI\Events\RequestEvent;
use GuzzleHttp\Psr7\Request;
use SlackPHP\SlackAPI\Events\ReceivedEvent;
use SlackPHP\SlackAPI\Events\ParsedReceivedEvent;
use SlackPHP\SlackAPI\Interfaces\PayloadResponseInterface;
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Class where the calls to Slack API are executed from
 * Provide payload to send method for sending it to Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class SlackAPI implements SlackAPIInterface
{
    /**
     * @var string|NULL
     */
    private $token = null;
    
    /**
     * @var PayloadProcessor|NULL
     */
    private $payloadProcessor = null;
    
    /**
     * @var PayloadResponseProcessor|NULL
     */
    private $payloadResponseProcessor = null;
    
    /**
     * @var ClientInterface|NULL
     */
    private $client = null;
    
    /**
     * @var EventDispatcherInterface|NULL
     */
    private $eventDispatcher = null;
    
    /**
     * Base URL for Slack API
     */
    const API_URL = 'https://slack.com/api/';
    
    /**
     * @param string $token
     * @param ClientInterface|null $client
     * @param EventDispatcherInterface|null $eventDispatcher
     */
    public function __construct($token, ClientInterface $client = null, EventDispatcherInterface $eventDispatcher = null) 
    {
        if ($token === null) {
            throw new SlackException('Auth Token has to be set before sending payload', SlackException::NO_TOKEN_SET);
        }
        
        if ($client === null) {
            $this->client = new Client();
        }
        
        if ($eventDispatcher === null) {
            $this->eventDispatcher = new EventDispatcher();
        }
        
        $this->token = $token;
        $this->payloadProcessor = new PayloadProcessor();
        $this->payloadResponseProcessor = new PayloadResponseProcessor();
    }
    
    /**
     * Send payload to Slack API
     * 
     * @param PayloadInterface $payload Payload to send
     * @return PayloadResponseInterface
     */
    public function send(PayloadInterface $payload)
    {
        $payload->validateRequired();
        
        $processedPayload = $this->payloadProcessor->process($payload);
        
        $processedPayload['token'] = $this->token;
        $requestEvent = new RequestEvent();
        $requestEvent
            ->setPayload($payload)
            ->setProcessedPayload($processedPayload)
        ;
        
        $this->eventDispatcher->dispatch(RequestEvent::EVENT_NAME, $requestEvent);
        $request = new Request(
            'POST',
            self::API_URL . $payload->getMethod(),
            ['Content-Type' => 'application/x-www-form-urlencoded'],
            http_build_query($processedPayload)
        );
        $response = $this->client->send($request);
        $this->eventDispatcher->dispatch(ReceivedEvent::EVENT_NAME, new ReceivedEvent($response));
        AnnotationRegistry::registerLoader('class_exists');
        $processedResponse = $this->payloadResponseProcessor->process($response, $payload->getResponseClass());
    
        $this->eventDispatcher->dispatch(ParsedReceivedEvent::EVENT_NAME, new ParsedReceivedEvent($processedResponse));
        
        return $processedResponse;
    }
}