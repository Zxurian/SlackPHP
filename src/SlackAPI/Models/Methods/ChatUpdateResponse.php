<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Enumerators\Parse;

/**
 * Class, used for deserialization of payload received after updating message in channel
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getTs()
 * @method string getChannel()
 * @method string getText()
 */
class ChatUpdateResponse extends AbstractPayloadResponse
{
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $ts = null;

    /**
     * @var Parse|NULL
     * @Type("SlackPHP\SlackAPI\Enumerators\Parse")
     */
    protected $channel = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $text = null;
}
