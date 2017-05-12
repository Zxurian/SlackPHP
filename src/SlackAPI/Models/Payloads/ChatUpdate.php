<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\Attachment;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;

/**
 * This method updates a message in a channel.
 * Though related to chat.postMessage, some parameters of chat.update are handled differently.
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/methods/chat.update
 * @package SlackAPI
 * @version 0.1
 * 
 * @method string getTs()
 * @method string getChannel()
 * @method string getText()
 * @method Attachment[] getAttachments()
 * @method string getParse()
 * @method bool getLinkNames()
 * @method bool getAsUser()
 * @method bool getMarkdown()
 */
class ChatUpdate extends AbstractPayload
{
    const method = 'chat.update';
    
    /**
     * @var string
     * @Required
     */
    private $ts = null;
    
    /**
     * @var string
     * @Required
     */
    private $channel = null;
    
    /**
     * @var string
     * @Required
     */
    private $text = null;
    
    /**
     * @var Attachment[]
     */
    private $attachments = [];
    
    /**
     * @var string
     */
    private $parse = null;
    
    /**
     * @var bool
     */
    private $linkNames = null;
    
    /**
     * @var bool
     */
    private $asUser = null;
    
    /**
     * @var bool
     */
    private $mrkdwn = null;
    
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