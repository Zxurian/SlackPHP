<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\Attachment;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;

/**
 * Class creates payload for updating a message in channel
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ChatUpdate extends AbstractPayload
{
    /**
     * @var string|NULL
     */
    private $channel = null;
    
    /**
     * @var string|NULL
     */
    private $ts = null;
    
    /**
     * @var string|NULL
     */
    private $text = null;
    
    /**
     * @var Attachment[]
     */
    private $attachments = [];
    
    /**
     * @var string|NULL
     */
    private $parse = null;
    
    /**
     * @var bool|NULL
     */
    private $linkNames = null;
    
    /**
     * @var bool|NULL
     */
    private $asUser = null;
    
    /**
     * Setter for channel, where the message should be updated
     *
     * @param string $channel
     * @return ChatUpdate
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
        
        return $this;
    }

    /**
     * Getter for channel
     * 
     * @return string|NULL
     */
    public function getChannel()
    {
        return $this->channel;
    }
    
    /**
     * Setter for ts of message, that has to be updated
     *
     * @param string $ts
     * @return ChatUpdate
     */
    public function setTs($ts)
    {
        $this->ts = $ts;
    
        return $this;
    }
    
    /**
     * Getter of ts
     *
     * @return string|NULL
     */
    public function getTs()
    {
        return $this->ts;
    }
    
    /**
     * Setter for text
     *
     * @param string $text
     * @return ChatUpdate
     */
    public function setText($text)
    {
        $this->text = $text;
    
        return $this;
    }
    
    /**
     * Getter for text
     *
     * @return string|NULL
     */
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * Getter for attachments
     *
     * @return Attachment[]
     */
    public function getAttachments()
    {
        return $this->attachments;
    }
    
    /**
     * Add new attachment to array
     *
     * @param Attachment $attachment
     * @return ChatUpdate
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
    
        return $this;
    }
    
    /**
     * Setter for parse
     *
     * @param string $parse
     * @return ChatUpdate
     */
    public function setParse($parse)
    {
        $this->parse = $parse;
    
        return $this;
    }
    
    /**
     * Getter for parse
     *
     * @return string|NULL
     */
    public function getParse()
    {
        return $this->parse;
    }
    
    /**
     * Setter for linkNames
     *
     * @param bool $linkNames
     * @return ChatUpdate
     */
    public function setLinkNames($linkNames)
    {
        $this->linkNames = $linkNames;
    
        return $this;
    }
    
    /**
     * Getter for linkNames
     *
     * @return bool|NULL
     */
    public function getLinkNames()
    {
        return $this->linkNames;
    }
    
    /**
     * Setter for asUser
     *
     * @param bool $asUser
     * @return ChatUpdate
     */
    public function setAsUser($asUser)
    {
        $this->asUser = $asUser;
    
        return $this;
    }
    
    /**
     * Getter for asUser
     *
     * @return bool|NULL
     */
    public function getAsUser()
    {
        return $this->asUser;
    }
    
    /**
     * Getter for current API method, used for url
     *
     * @inheritdoc
     */
    public function getMethod()
    {
        return 'chat.update';
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Interfaces\PayloadInterface::hasRequiredProperties()
     */
    public function hasRequiredProperties()
    {
        if ($this->ts === null) {
            return false;
        }
        
        if ($this->channel === null) {
            return false;
        }
        
        if ($this->text === null) {
            return false;
        }
        
        return true;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Interfaces\PayloadInterface::getMissingRequiredProperties()
     */
    public function getMissingRequiredProperties()
    {
        $return = [];
        
        if ($this->ts === null) {
            $return[] = 'ts';
        }
        
        if ($this->channel === null) {
            $return[] = 'channel';
        }
        
        if ($this->text === null) {
            $return[] = 'text';
        }
        
        return $return;
    }
}