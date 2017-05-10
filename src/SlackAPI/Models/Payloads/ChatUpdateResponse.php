<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of payload received after updating message in channel
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ChatUpdateResponse extends AbstractPayloadResponse
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
     * @var string|NULL
     * @Type("string")
     */
    private $text = null;
    
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
     * Getter for text
     * 
     * @return array
     */
    public function getText()
    {
        return $this->text;
    }
}
