<?php
namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;
use SlackPHP\SlackAPI\Models\Attachment;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class creates payload for posting message to Slack channel
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @method string getChannel()
 * @method string getText()
 * @method string getParse()
 * @method bool getLinkNames()
 * @method Attachment[] getAttachments()
 * @method bool getUnfurlLinks()
 * @method bool getUnfurlMedia()
 * @method string getUsername()
 * @method bool getAsUser()
 * @method string getIconUrl()
 * @method string getIconEmoji()
 * @method string getThreadTs()
 * @method bool getReplyBroadcast()
 * @method bool getMarkdown()
 */
class ChatPostMessage extends AbstractPayload
{
    const method = 'chat.postMessage';
    
    /**
     * @var string|NULL
     */
    private $channel = null;

    /**
     * @var string|NULL
     */
    private $text = null;

    /**
     * @var string|NULL
     */
    private $parse = null;
    
    /**
     * @var bool|NULL
     */
    private $linkNames = null;
    
    /**
     * @var Attachment[]
     */
    private $attachments = [];
    
    /**
     * @var bool|NULL
     */
    private $unfurlLinks = null;
    
    /**
     * @var bool|NULL
     */
    private $unfurlMedia = null;
    
    /**
     * @var string|NULL
     */
    private $username = null;

    /**
     * @var bool|NULL
     */
    private $asUser = null;

    /**
     * @var string|NULL
     */
    private $iconUrl = null;
    
    /**
     * @var string|NULL
     */
    private $iconEmoji = null;
    
    /**
     * @var string|NULL
     */
    private $threadTs = null;

    /**
     * @var bool|NULL
     */
    private $replyBroadcast = null;
    
    /**
     * @var bool|NULL
     */
    private $mrkdwn = null;
    
    /**
     * Setter for channel, where the message will be sent to
     *
     * @param string $channel
     * @return ChatPostMessage
     */
    public function setChannel($channel)
    {
        if (!is_scalar($channel)) {
            throw new SlackException('Channel should be a string type', SlackException::NOT_STRING);
        }
        
        $this->channel = $channel;
        
        return $this;
    }

    /**
     * Setter for text
     * 
     * @param string $text
     * @return ChatPostMessage
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new SlackException('Text should be a string type', SlackException::NOT_STRING);
        }
        
        $this->text = $text;
        
        return $this;
    }

    /**
     * Setter for parse
     * 
     * @param string $parse
     * @return ChatPostMessage
     */
    public function setParse($parse)
    {
        if (!is_scalar($channel)) {
            throw new SlackException('Channel should be a string type', SlackException::NOT_STRING);
        }
        
        $this->parse = $parse;
        
        return $this;
    }
    
    /**
     * Setter for linkNames
     * 
     * @param bool $linkNames
     * @return ChatPostMessage
     */
    public function setLinkNames($linkNames)
    {
        $this->linkNames = $linkNames;
        
        return $this;
    }
    
   /**
     * Add new attachment to array
     * 
     * @param Attachment $attachment
     * @return ChatPostMessage
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
        
        return $this;
    }

    /**
     * Setter for unfurlLinks
     *
     * @param bool $unfurlLinks
     * @return ChatPostMessage
     */
    public function setUnfurlLinks($unfurlLinks)
    {
        $this->unfurlLinks = $unfurlLinks;
        
        return $this;
    }
    
    /**
     * Setter for unfurlMedia
     *
     * @param bool $unfurlMedia
     * @return ChatPostMessage
     */
    public function setUnfurlMedia($unfurlMedia)
    {
        $this->unfurlMedia = $unfurlMedia;
        
        return $this;
    }
    
    /**
     * Setter for username
     * 
     * @param string $username
     * @return ChatPostMessage
     */
    public function setUsername($username)
    {
        $this->username = $username;
        
        return $this;
    }

    /**
     * Setter for asUser
     * 
     * @param bool $asUser
     * @return ChatPostMessage
     */
    public function setAsUser($asUser)
    {
        $this->asUser = $asUser;
        
        return $this;
    }

    /**
     * Setter for iconUrl
     * 
     * @param string $iconUrl
     * @return ChatPostMessage
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;
        
        return $this;
    }
    
    /**
     * Setter for iconEmoji
     *
     * @param string $iconEmoji
     * @return ChatPostMessage
     */
    public function setIconEmoji($iconEmoji)
    {
        if (substr($iconEmoji, 0, 1) !== ':') {
            $iconEmoji = ':'.$iconEmoji.':';
        }

        $this->iconEmoji = $iconEmoji;
        
        return $this;
    }

    /**
     * Setter for threadTs
     * 
     * @param string $threadTs
     * @return ChatPostMessage
     */
    public function setThreadTs($threadTs)
    {
        $this->threadTs = $threadTs;
        
        return $this;
    }
    
    /**
     * Setter for replyBroadcast
     * 
     * @param bool $replyBroadcast
     * @return ChatPostMessage
     */
    public function setReplyBroadcast($replyBroadcast)
    {
        $this->replyBroadcast = $replyBroadcast;
        
        return $this;
    }
    
    /**
     * Setter for markdown
     * 
     * @param bool $mrkdwn
     * @return ChatPostMessage
     */
    public function setMrkdwn($mrkdwn)
    {
        $this->mrkdwn = $mrkdwn;
        
        return $this;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Interfaces\PayloadInterface::hasRequiredProperties()
     */
    public function hasRequiredProperties()
    {
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
        
        if ($this->channel === null) {
            $return[] = 'channel';
        }
        
        if ($this->text === null) {
            $return[] = 'text';
        }
        
        return $return;
    }
}
