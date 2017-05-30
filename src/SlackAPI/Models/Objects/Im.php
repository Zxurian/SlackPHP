<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;

/**
 * Model of im
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
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
     * @var string|null
     * @Type("string")
     */
    protected $id = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isIm = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $user = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    protected $created = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isUserDeleted = null;
}