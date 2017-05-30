<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;
use SlackPHP\SlackAPI\Models\Objects\Topic;
use SlackPHP\SlackAPI\Models\Objects\Purpose;
use SlackPHP\SlackAPI\Models\MessageParts\Message;

/**
 * Model of group
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
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
    protected $isGroup = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $created = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $creator = null;
    
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isArchived = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isMpim = null;
    
    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $members = [];
    
    /**
     * @var Topic|null
     * @Type("SlackPHP\SlackAPI\Models\Objects\Topic")
     */
    protected $topic = null;
    
    /**
     * @var Purpose|null
     * @Type("SlackPHP\SlackAPI\Models\Objects\Purpose")
     */
    protected $purpose = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $lastRead = null;
    
    /**
     * @var Message|null
     * @Type("SlackPHP\SlackAPI\Models\MessageParts\Message")
     */
    protected $latest = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $unreadCount = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $unreadCountDisplay = null;
}