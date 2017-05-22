<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;
use SlackPHP\SlackAPI\Models\Objects\Topic;
use SlackPHP\SlackAPI\Models\Objects\Purpose;
use SlackPHP\SlackAPI\Models\MessageParts\Message;

/**
 * Model of channel
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/types/channel
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getId()
 * @method string getName()
 * @method bool getIsChannel()
 * @method int getCreated()
 * @method string getCreator()
 * @method bool getIsArchived()
 * @method bool getIsGeneral()
 * @method string[] getMembers()
 * @method Topic getTopic()
 * @method Purpose getPurpose()
 * @method bool getIsMember()
 * @method string getLastRead()
 * @method Message getLatest()
 * @method int getUnreadCount()
 * @method int getUnreadCountDisplay()
 */
class Channel extends MagicGetter
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
    protected $isChannel = null;
    
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
    protected $isGeneral = null;
    
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
     * @var bool
     * @Type("boolean")
     */
    protected $isMember = null;
    
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