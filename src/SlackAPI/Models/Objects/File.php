<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;
use SlackPHP\SlackAPI\Models\Objects\Reaction;

/**
 * Model of file
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/types/file
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getId()
 * @method int getCreated()
 * @method int getTimestamp()
 * @method string getName()
 * @method string getTitle()
 * @method string getMimetype()
 * @method string getFiletype()
 * @method string getPrettyType()
 * @method string getUser()
 * @method string getMode()
 * @method bool getEditable()
 * @method bool getIsExternal()
 * @method string getExternalType()
 * @method string getUsername()
 * @method int getSize()
 * @method string getUrlPrivate()
 * @method string getUrlPrivateDownload()
 * @method string getThumb64()
 * @method string getThumb80()
 * @method string getThumb360()
 * @method string getThumb360Gif()
 * @method int getThumb360W()
 * @method int getThumb360H()
 * @method string getThumb480()
 * @method int getThumb480W()
 * @method int getThumb480H()
 * @method string getThumb160()
 * @method string getPermalink()
 * @method string getPermalinkPublic()
 * @method string getEditLink()
 * @method string getPreview()
 * @method string getPreviewHighlight()
 * @method int getLines()
 * @method int getLinesMore()
 * @method bool getIsPublic()
 * @method bool getPublicUrlShared()
 * @method bool getDisplayAsBot()
 * @method string[] getChannels()
 * @method string[] getGroups()
 * @method string[] getIms()
 * @method Comment getInitialComment()
 * @method int getNumStars()
 * @method bool getIsStarred()
 * @method string[] getPinnedTo()
 * @method Reaction[] getReactions()
 * @method int getCommentsCount()
 */
class File extends MagicGetter
{
    /**
     * @var string|null
     * @Type("string")
     */
    protected $id = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    protected $created = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    protected $timestamp = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $name = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $title = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $mimetype = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $filetype = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $prettyType = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $user= null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $mode = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $editable = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isExternal = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $externalType = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $username = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    protected $size = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $urlPrivate = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $urlPrivateDownload = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $thumb64 = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $thumb80 = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $thumb360 = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $thumb360Gif = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    protected $thumb360W = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $thumb360H = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $thumb480 = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    protected $thumb480W = null;
    
    /**
     * @var int|null
     * @Type("integer")
     */
    protected $thumb480H = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $thumb160 = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $permalink = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $permalinkPublic = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $editLink = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $preview = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $previewHighlight = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    protected $lines = null;

    /**
     * @var int|null
     * @Type("integer")
     */
    protected $linesMore = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isPublic = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $publicUrlShared = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $displayAsBot = null;

    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $channels = [];

    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $groups = [];

    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $ims = [];

    /**
     * @var Comment|null
     * @Type("SlackPHP\SlackAPI\Models\Objects\Comment")
     */
    protected $initialComment = null;

    /**
     * @var int
     * @Type("integer")
     */
    protected $numStarred = null;

    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isStarred = null;

    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $pinnedTo = [];

    /**
     * @var Reaction
     * @Type("array<SlackPHP\SlackAPI\Models\Objects\Reaction>")
     */
    protected $reactions = null;

    /**
     * @var int
     * @Type("integer")
     */
    protected $commentsCount = null;
}