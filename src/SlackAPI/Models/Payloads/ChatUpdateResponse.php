<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

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
     * @var string|NULL
     * @Type("string")
     */
    protected $channel = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $text = null;
}
