<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;

/**
 * Model of profile
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/types/user
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getAvatarHash()
 * @method string getStatusEmoji()
 * @method string getStatusText()
 * @method string getFirstName()
 * @method string getLastName()
 * @method string getRealName()
 * @method string getEmail()
 * @method string getSkype()
 * @method string getPhone()
 * @method string getImage24()
 * @method string getImage32()
 * @method string getImage48()
 * @method string getImage72()
 * @method string getImage192()
 * @method string getImage512()
 */
class Profile extends MagicGetter
{
    /**
     * @var string|null
     * @Type("string")
     */
    protected $avatarHash = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $statusEmoji = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $statusText = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $firstName = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $lastName = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $realName= null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $email = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $skype = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $phone = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $image24 = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $image32 = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $image48 = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $image72 = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $image192 = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $image512= null;
}