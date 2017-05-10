<?php
namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;
use SlackPHP\SlackAPI\Models\Attachment;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class creates payload for posting message to Slack channel
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ChatPostMessage extends AbstractPayload
{
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
     * Setter for text
     * 
     * @param string $text
     * @return ChatPostMessage
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
     * Setter for parse
     * 
     * @param string $parse
     * @return ChatPostMessage
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
     * @return ChatPostMessage
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
     * Getter for unfurlLinks
     * 
     * @return bool|NULL
     */
    public function getUnfurlLinks()
    {
        return $this->unfurlLinks;
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
     * Getter for unfurlMedia
     * 
     * @return bool|NULL
     */
    public function getUnfurlMedia()
    {
        return $this->unfurlMedia;
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
     * Getter for username
     * 
     * @return string|NULL
     */
    public function getUsername()
    {
        return $this->username;
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
     * Getter for asUser
     * 
     * @return bool|NULL
     */
    public function getAsUser()
    {
        return $this->asUser;
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
     * Getter for iconUrl
     * 
     * @return string|NULL
     */
    public function getIconUrl()
    {
        return $this->iconUrl;
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
     * Getter for iconEmoji
     * 
     * @return string|NULL
     */
    public function getIconEmoji()
    {
        return $this->iconEmoji;
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
     * Getter of threadTs
     * 
     * @return string|NULL
     */
    public function getThreadTs()
    {
        return $this->threadTs;
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
     * Getter for replyBroadcast
     * 
     * @return bool|NULL
     */
    public function getReplyBroadcast()
    {
        return $this->replyBroadcast;
    }
    
    /**
     * Getter for current API method, used for url
     * 
     * @inheritdoc
     */
    public function getMethod()
    {
        return 'chat.postMessage';
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
     * Getter for markdown
     * 
     * @return bool|NULL
     */
    public function getMrkdwn()
    {
        return $this->mrkdwn;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Interfaces\PayloadInterface::hasRequiredProperties()
     */
    public function hasRequiredProperties()
    {
        if ($this->channel === null) {
            throw new SlackException('Channel property should be set before sending payload', SlackException::CHANNEL_NOT_SET);
        }
        
        if ($this->text === null) {
            throw new SlackException('Text property should be set before sending payload', SlackException::TEXT_NOT_SET);
        }
        
        return true;
    }
}
