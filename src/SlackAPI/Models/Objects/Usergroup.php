<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;

/**
 * Model of purpose
 *
 * @author Zxurian
 * @see https://api.slack.com/types/channel
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getId()
 * @method string getTeamId()
 * @method bool isUsergroup()
 * @method string getName()
 * @method string getDescription()
 * @method string getHandle()
 * @method bool getIsExternal()
 * @method int getDateCreate()
 * @method int getDateUpdate()
 * @method int getDateDelete()
 * @method string getAutoType()
 * @method string getCreatedBy()
 * @method string getUpdatedBy()
 * @method string|null getDeletedBy()
 * @method Prefs getPrefs()
 * @method string[] getUsers()
 * @method int getUserCount()
 */
class Usergroup extends MagicGetter
{
    /**
     * @var string
     * @Type("string")
     */
    protected $id;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $teamId;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isUsergroup;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $name;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $description;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $handle;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isExternal;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $dateCreate;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $dateUpdate;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $dateDelete;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $autoType;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $createdBy;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $updatedBy;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $deletedBy;
    
    /**
     * @var string
     * @Type("SlackPHP\SlackAPI\Models\Objects\Prefs")
     */
    protected $prefs;
    
    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $users;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $userCount;
    
}