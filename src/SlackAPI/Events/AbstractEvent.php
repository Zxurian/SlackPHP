<?php 

namespace SlackPHP\SlackAPI\Events;

use Symfony\Component\EventDispatcher\Event;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;

/**
 * Class for the events, that save original payload
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class AbstractEvent extends Event
{
    /** 
     * @var AbstractPayload|NULL
     */
    protected $payload = null;
    
    /**
     * Setter for the original payload
     * 
     * @param AbstractPayload $payload
     * @return AbstractEvent
     */
    public function setPayload(AbstractPayload $payload)
    {
        $this->payload = $payload;
        
        return $this;
    }
    
    /**
     * Getter for the original payload
     * 
     * @return AbstractPayload|NULL
     */
    public function getPayload()
    {
        return $this->payload;
    }
    
    /**
     * Get method of Slack API
     * 
     * @return string
     */
    public function getMethod()
    {
        return get_class($this->payload);
    }
}