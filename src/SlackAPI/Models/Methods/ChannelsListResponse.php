<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use SlackPHP\SlackAPI\Models\Objects\Channel;
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
     * @var Channel[]|NULL
     * @Type("array<SlackPHP\SlackAPI\Models\Objects\Channel>")
     */
    protected $channels = null;
}