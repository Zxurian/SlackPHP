<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of payload received after posting message to channel
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ChatPostMessageResponse extends AbstractPayloadResponse
{
    /**
     * @var string|NULL
     * @Type("string")
     */
    private $ts = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    private $channel = null;

    /**
     * @var array|NULL
     * @Type("array")
     */
    private $message = null;
    
    /**
     * Getter for ts
     * 
     * @return string|NULL
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * Getter for channel
     * 
     * @return string|NULL
     */
    public function getChannel()
    {
        return $this->channel;
    }
    
    /**
     * Getter for message array
     * 
     * @return array
     */
    public function getMessage()
    {
        return $this->message;
    }
}
