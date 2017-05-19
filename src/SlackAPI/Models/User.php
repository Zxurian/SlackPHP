<?php

namespace SlackPHP\SlackAPI\Models;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\AbstractModels\MagicGetter;
use SlackPHP\SlackAPI\Models\Profile;

/**
 * Model of User
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
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
     * @var string
     * @Type("string")
     */
    protected $id = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $name = null;

    /**
     * @var bool
     * @Type("boolean")
     */
    protected $deleted = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $color = null;
    /**
     * @var Profile
     * @Type("SlackPHP\SlackAPI\Models\Profile")
     */
    protected $profile = null;
    /**
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isAdmin = null;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isOwner = null;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isPrimaryOwner = null;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isRestricted = null;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isUltraRestricted = null;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $updated = null;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $has2fa = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $twoFactorType = null;
}