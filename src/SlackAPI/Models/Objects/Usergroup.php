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
     * @var string|null
     * @Type("string")
     */
    protected $id = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $teamId = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isUsergroup = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $name = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $description = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $handle = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isExternal = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $dateCreate = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $dateUpdate = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $dateDelete = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $autoType = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $createdBy = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $updatedBy = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $deletedBy = null;
    
    /**
     * @var string|null
     * @Type("SlackPHP\SlackAPI\Models\Objects\Prefs")
     */
    protected $prefs = null;
    
    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $users = [];
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $userCount = null;
    
}