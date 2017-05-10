<?php

namespace SlackPHP\SlackAPI\Events;

use Symfony\Component\EventDispatcher\Event;

/**
 * Event is triggered, when payload is processed, but not sent yet
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class RequestEvent extends AbstractEvent
{
    /**
     * @var array|NULL
     */
    private $processedPayload = null;

    /**
     * Event triggered before it is sent to the Slack API
     */
    const EVENT_NAME = 'SLACKAPI_EVENT_REQUEST';
    
    /**
     * Setter for the processedPayload
     * 
     * @param array $payload
     * @return AbstractEvent
     */
    public function setProcessedPayload(array $processedPayload)
    {
        $this->processedPayload = $processedPayload;
        
        return $this;
    }

    /**
     * Getter for processedPayload
     * 
     * @return array|NULL
     */
    public function getProcessedPayload()
    {
        return $this->processedPayload;
    }
}