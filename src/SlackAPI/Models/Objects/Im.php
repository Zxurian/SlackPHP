<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;

/**
 * Model of im
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/types/im
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getId()
 * @method bool getIsIm()
 * @method string getUser()
 * @method int getCreated()
 * @method bool getIsUserDeleted()
 */
class Im extends MagicGetter
{
    /**
     * @var string
     * @Type("string")
     */
    protected $id = null;

    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isIm = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $user = null;

    /**
     * @var int
     * @Type("integer")
     */
    protected $created = null;

    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isUserDeleted = null;
}