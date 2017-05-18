<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use JMS\Serializer\Annotation\Type;

/**
 * Privides ok and error properties for deserialization of received payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.1
 * 
 * @method bool getOk()
 * @method string getError()
 */
abstract class AbstractPayloadResponse extends MagicGetter
{
    /**
     * @var bool|NULL
     * @Type("boolean")
     */
    protected $ok = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $error = null;
}