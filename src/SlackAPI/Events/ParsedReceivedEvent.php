<?php

namespace SlackPHP\SlackAPI\Events;

use Symfony\Component\EventDispatcher\Event;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;

/**
 * Event is triggered, when payload is received and parsed
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ParsedReceivedEvent extends AbstractEvent
{
    /**
     * @var AbstractPayloadResponse|NULL
     */
    private $payloadResponse = null;

    /**
     * Event triggered after the responce received from the Slack API and has been parsed
     */
    const EVENT_NAME = 'SLACKAPI_EVENT_PARSED_RECEIVED';
    
    /**
     * @param AbstractPayloadResponse $payloadResponse
     */
    public function setPayloadResponse(AbstractPayloadResponse $payloadResponse)
    {
        $this->payloadResponse = $payloadResponse;

        return $this;
    }

    /**
     * Getter for response payload
     * 
     * @return AbstractPayloadResponse|NULL
     */
    public function getPayloadResponse()
    {
        return $this->payloadResponse;
    }
}