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
     * @var ResponseType
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
     * Set the text
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return \SlackPHP\SlackAPI\Models\MessageParts\Message
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new \InvalidArgumentException('Must provide scalar value for text');
        }
        
        $this->text = $text;
        
        return $this;
    }
    
    /**
     * Add an attachment
     * 
     * @param Attachment $attachment
     * @return \SlackPHP\SlackAPI\Models\MessageParts\Message
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
        
        return $this;
    }
    
    /**
     * Setter for threadTs
     * 
     * @param string $threadTs
     * @throws \InvalidArgumentException
     * @return \SlackPHP\SlackAPI\Models\MessageParts\Message
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
     * Setter for responseType
     * 
     * @param ResponseType $responseType
     * @return \SlackPHP\SlackAPI\Models\MessageParts\Message
     */
    public function setResponseType(ResponseType $responseType)
    {
        $this->responseType = $responseType;
        
        return $this;
    }
    
    /**
     * Setter for replaceOriginal
     * 
     * @param bool $replaceOriginal
     * @throws \InvalidArgumentException
     * @return \SlackPHP\SlackAPI\Models\MessageParts\Message
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
     * Setter for deleteOriginal
     * 
     * @param bool $deleteOriginal
     * @throws \InvalidArgumentException
     * @return \SlackPHP\SlackAPI\Models\MessageParts\Message
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