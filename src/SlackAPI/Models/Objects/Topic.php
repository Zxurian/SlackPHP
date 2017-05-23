<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;

/**
 * Model of topic
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/types/channel
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getValue()
 * @method string getCreator()
 * @method int getLastSet()
 */
class Topic extends MagicGetter
{
    /**
     * @var string
     * @Type("string")
     */
    protected $value = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $creator = null;

    /**
     * @var int
     * @Type("integer")
     */
    protected $lastSet = null;
}