<?php

namespace SlackPHP\SlackAPI\Models;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\AbstractModels\MagicGetter;
use SlackPHP\SlackAPI\Models\Message;

/**
 * Model of mpim
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/types/mpim
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getId()
 * @method string getName()
 * @method bool getIsMpim()
 * @method bool getIsGroup()
 * @method int getCreated()
 * @method string getCreator()
 * @method array getMembers()
 * @method string getLastRead()
 * @method Message getLatest()
 * @method int getUnreadCount()
 * @method int getUnreadCountDisplay()
 */

class Mpim extends MagicGetter
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
    protected $isMpim = null;

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
     * @var array
     * @Type("array<string>")
     */
    protected $members = null;

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