<?php

namespace SlackPHP\SlackAPI\Events;

use Symfony\Component\EventDispatcher\Event;
use Psr\Http\Message\ResponseInterface;

/**
 * Event is triggered, when response payload is just received 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ReceivedEvent extends AbstractEvent
{
    /**
     * @var ResponseInterface|NULL
     */
    private $response = null;

    /**
     * Event triggered after request, but before response parsed
     */
    const EVENT_NAME = 'SLACKAPI_EVENT_RECEIVED';

    /**
     * @param ResponseInterface $response
     */
    public function setResponse(ResponseInterface $response)
    {
        $this->response = $response;
         
        return $this;
    }

    /**
     * @return ResponseInterface|NULL
     */
    public function getResponse()
    {
        return $this->response;
    }
}