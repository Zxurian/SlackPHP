<?php 

namespace SlackPHP\SlackAPI\Events;

use SlackPHP\SlackAPI\Interfaces\PayloadInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class for the events, that save original payload
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class AbstractEvent extends Event
{
    /** 
     * @var PayloadInterface|NULL
     */
    private $payload = null;
    
    /**
     * Setter for the original payload
     * 
     * @param PayloadInterface $payload
     * @return AbstractEvent
     */
    public function setPayload(PayloadInterface $payload)
    {
        $this->payload = $payload;
        
        return $this;
    }
    
    /**
     * Getter for the original payload
     * 
     * @return PayloadInterface|NULL
     */
    public function getPayload()
    {
        return $this->payload;
    }
    
    /**
     * Get type of the payload
     * 
     * @return string
     */
    public function getPayloadType()
    {
        return get_class($this->payload);
    }
}