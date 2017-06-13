<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of response payload received after posting message to channel
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
     * @Type("SlackPHP\SlackAPI\Models\MessageParts\Message")
     */
    protected $message = null;
}
