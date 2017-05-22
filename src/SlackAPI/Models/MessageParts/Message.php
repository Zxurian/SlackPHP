<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;
use SlackPHP\SlackAPI\Models\MessageParts\Attachment;

/**
 * Model of message
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/docs/interactive-message-field-guide#message
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getText()
 * @method Attachment[] getAttachments()
 * @method string getThreadTs()
 * @method string getResponseType()
 * @method bool getReplaceOriginal()
 * @method bool getDeleteOriginal()
 */
class Message extends MagicGetter
{
    /**
     * @var string
     * @Type("string")
     */
    protected $text = null;

    /**
     * @var Attachment[]
     * @Type("array<SlackPHP\SlackAPI\Models\Attachment>")
     */
    protected $attachments = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $threadTs = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $responseType = null;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $replaceOriginal = null;
    
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $deleteOriginal = null;
}