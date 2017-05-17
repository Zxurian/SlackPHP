<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of respponse payload received after posting message to channel
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ChatPostMessageResponse extends AbstractPayloadResponse
{
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $ts = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $channel = null;

    /**
     * @var array|NULL
     * @Type("array")
     */
    protected $message = null;
}
