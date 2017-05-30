<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;
use SlackPHP\SlackAPI\Models\Objects\Profile;

/**
 * Model of user
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/types/user
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getId()
 * @method string getName()
 * @method bool getDeleted()
 * @method string getColor()
 * @method Profile getProfile()
 * @method bool getIsAdmin()
 * @method bool getIsOwner()
 * @method bool getIsPrimaryOwner()
 * @method bool getIsRestricted()
 * @method bool getIsUltraRestricted()
 * @method int getUpdated()
 * @method bool getHas2fa()
 * @method string getTwoFactorType()
 */
class User extends MagicGetter
{
    /**
     * @var string|null
     * @Type("string")
     */
    protected $id = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $name = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $deleted = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $color = null;
    
    /**
     * @var Profile|null
     * @Type("SlackPHP\SlackAPI\Models\Objects\Profile")
     */
    protected $profile = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isAdmin = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isOwner = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isPrimaryOwner = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isRestricted = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isUltraRestricted = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $updated = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $has2fa = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $twoFactorType = null;
}