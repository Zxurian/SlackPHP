<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of respponse payload received after posting message to channel
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getTs()
 * @method string getChannel()
 * @method array getMessage()
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
     * @var Message|NULL
     * @Type("SlackPHP\SlackAPI\Models\Message")
     */
    protected $message = null;
}
