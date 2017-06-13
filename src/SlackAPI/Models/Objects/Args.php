<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;

/**
 * Model of args
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/methods/api.test
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getError()
 * @method string getFoo()
 */
class Args extends MagicGetter
{
    /**
     * @var string|null
     * @Type("string")
     */
    protected $error = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $foo = null;
}