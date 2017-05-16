<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of response on channels list payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.2
 * 
 * @method array getChannels()
 */
class ChannelsListResponse extends AbstractPayloadResponse
{
    /**
     * @var array|NULL
     * @Type("array")
     */
    protected $channels = null;
}