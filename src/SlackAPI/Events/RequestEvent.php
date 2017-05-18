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
    private $preparedPayload = null;

    /**
     * Event triggered before it is sent to the Slack API
     */
    const EVENT_NAME = 'SLACKAPI_EVENT_REQUEST';
    
    /**
     * Setter for the preparedPayload
     * 
     * @param array $payload
     * @return AbstractEvent
     */
    public function setPreparedPayload(array $preparedPayload)
    {
        $this->preparedPayload = $preparedPayload;
        
        return $this;
    }

    /**
     * Getter for preparedPayload
     * 
     * @return array|NULL
     */
    public function getPreparedPayload()
    {
        return $this->preparedPayload;
    }
}