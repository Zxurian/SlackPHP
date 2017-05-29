<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\MessageParts\Attachment;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Enumerators\ResponseType;

/**
 * Model of message
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/docs/interactive-message-field-guide#message
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getText()
 * @method Attachment[] getAttachments()
 * @method string getThreadTs()
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
     * The basic text of the message.
     * Only required if the message contains zero attachments.
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return Message
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new \InvalidArgumentException('Must provide scalar value for text');
        }
        
        $this->text = (string)$text;
        
        return $this;
    }
    
    /**
     * Add an Attachment
     * Adds additional components to the message. Messages should contain no more than 20 attachments.
     * 
     * @param Attachment $attachment
     * @return Message
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
        
        return $this;
    }
    
    /**
     * When replying to a parent message, this value is the ts value of the parent message to the thread.
     * See message threading for more context.
     * 
     * @param string $threadTs
     * @throws \InvalidArgumentException
     * @return Message
     */
    public function setThreadTs($threadTs)
    {
        if (!is_scalar($threadTs)) {
            throw new \InvalidArgumentException('Must provide scalar value for thread_ts');
        }
        
        $this->threadTs = $threadTs;
        
        return $this;
    }
    
    /**
     * Get the ResponseType Enum
     * 
     * @return ResponseType
     */
    public function getResponseType()
    {
        return new ResponseType($this->responseType);
    }
    
    /**
     * Set a a value for responeType
     * This field cannot be specified for a brand new message and must be
     * used only in response to the execution of message button action or a
     * slash command response. Once a response_type is set, it cannot be
     * changed when updating the message.
     * 
     * @param ResponseType $responseType
     * @return Message
     */
    public function setResponseType(ResponseType $responseType)
    {
        $this->responseType = $responseType->getValue();
        
        return $this;
    }
    
    /**
     * Used only when creating messages in response to a button action invocation.
     * When set to true, the inciting message will be replaced by this
     * message you're providing. When false, the message you're providing
     * is considered a brand new message.
     * 
     * @param bool $replaceOriginal
     * @throws \InvalidArgumentException
     * @return Message
     */
    public function setReplaceOriginal($replaceOriginal)
    {
        if (!is_bool($replaceOriginal)) {
            throw new \InvalidArgumentException('Must provide boolean value for replace_original');
        }
        
        $this->replaceOriginal = $replaceOriginal;
        
        return $this;
    }
    
    /**
     * Used only when creating messages in response to a button action invocation.
     * When set to true, the inciting message will be deleted and if a message
     * is provided, it will be posted as a brand new message.
     * 
     * @param bool $deleteOriginal
     * @throws \InvalidArgumentException
     * @return Message
     */
    public function setDeleteOriginal($deleteOriginal)
    {
        if (!is_bool($deleteOriginal)) {
            throw new \InvalidArgumentException('Must provide boolean value for delete_original');
        }
        
        $this->deleteOriginal = $deleteOriginal;
        
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    public function validateModel()
    {
        if ($this->text === null && count($this->attachments) == 0) {
            throw new SlackException('Must provide either text or Message', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->threadTs === null && $this->responseType !== null) {
            throw new SlackException('Cannot provide a response type for a new message', SlackException::INVALID_RESPONSE_TYPE);
        }
    }

}