<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\MessageParts\Attachment;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use SlackPHP\SlackAPI\Exceptions\SlackException;

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
class Message extends AbstractModel
{
    /**
     * @var string
     * @Type("string")
     */
    protected $text = null;

    /**
     * @var Attachment[]
     * @Type("array<SlackPHP\SlackAPI\Models\MessageParts\Attachment>")
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
    
    /**
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    protected function validateModel()
    {
        if ($this->text === null && count($this->attachments) == 0) {
            throw new SlackException('Must provide either text or Message', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->threadTs === null && $this->responseType !== null) {
            throw new SlackException('Cannot provide a response type for a new message', SlackException::INVALID_RESPONSE_TYPE);
        }
    }

}