<?php

namespace SlackPHP\SlackAPI\Events;

use Symfony\Component\EventDispatcher\Event;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;

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
    private $payload = null;

    /**
     * Event triggered after the responce received from the Slack API and has been parsed
     */
    const EVENT_NAME = 'SLACKAPI_EVENT_PARSED_RECEIVED';
    
    /**
     * @param array $payload
     */
    public function __construct(AbstractPayloadResponse $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Getter for payload, that has been parsed
     * 
     * @return array|NULL
     */
    public function getPayload()
    {
        return $this->payload;
    }
}