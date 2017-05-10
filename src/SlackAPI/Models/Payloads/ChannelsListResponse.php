<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of response channels list payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ChannelsListResponse extends AbstractPayloadResponse
{
    /**
     * @var array|NULL
     * @Type("array")
     */
    private $channels = null;
    
    /**
     * Getter for channels array
     *
     * @return array
     */
    public function getChannels()
    {
        return $this->channels;
    }
}