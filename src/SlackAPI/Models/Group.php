<?php

namespace SlackPHP\SlackAPI\Models;

use JMS\Serializer\Annotation\Type;
use Doctrine\Common\Annotations\Annotation\Required;
use SlackPHP\SlackAPI\Models\AbstractModels\MagicGetter;
use SlackPHP\SlackAPI\Models\Topic;
use SlackPHP\SlackAPI\Models\Purpose;
use SlackPHP\SlackAPI\Models\Message;

/**
 * Model of group
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/types/channel
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getId()
 * @method string getName()
 * @method bool getIsGroup()
 * @method int getCreated()
 * @method string getCreator()
 * @method bool getIsArchived()
 * @method bool getIsMpim()
 * @method string[] getMembers()
 * @method Topic getTopic()
 * @method Purpose getPurpose()
 * @method string getLastRead()
 * @method Message getLatest()
 * @method int getUnreadCount()
 * @method int getUnreadCountDisplay()
 */
class Group extends MagicGetter
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
    protected $isGroup = null;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $created = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $creator = null;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isArchived = null;

    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isMpim = null;
    
    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $members = null;
    
    /**
     * @var Topic
     * @Type("SlackPHP\SlackAPI\Models\Topic")
     */
    protected $topic = null;
    
    /**
     * @var Purpose
     * @Type("SlackPHP\SlackAPI\Models\Purpose")
     */
    protected $purpose = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $lastRead = null;
    
    /**
     * @var Message
     * @Type("SlackPHP\SlackAPI\Models\Message")
     */
    protected $latest = null;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $unreadCount = null;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $unreadCountDisplay = null;
}