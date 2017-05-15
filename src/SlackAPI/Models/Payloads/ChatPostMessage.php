<?php
namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;
use SlackPHP\SlackAPI\Models\Attachment;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use Doctrine\Common\Annotations\Annotation\Required;

/**
 * This method posts a message to a public channel, private channel, or direct message/IM channel.
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/methods/chat.postMessage
 * @package SlackAPI
 * @version 0.2
 * 
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
     * @var string
     * @Required
     */
    protected $channel = null;

    /**
     * @var string
     */
    protected $text = null;

    /**
     * @var string
     */
    protected $parse = null;
    
    /**
     * @var bool
     */
    protected $linkNames = null;
    
    /**
     * @var Attachment[]
     */
    protected $attachments = [];
    
    /**
     * @var bool
     */
    protected $unfurlLinks = null;
    
    /**
     * @var bool
     */
    protected $unfurlMedia = null;
    
    /**
     * @var string
     */
    protected $username = null;

    /**
     * @var bool
     */
    protected $asUser = null;

    /**
     * @var string
     */
    protected $iconUrl = null;
    
    /**
     * @var string
     */
    protected $iconEmoji = null;
    
    /**
     * @var string
     */
    protected $threadTs = null;

    /**
     * @var bool
     */
    protected $replyBroadcast = null;
    
    /**
     * @var bool
     */
    protected $mrkdwn = null;
    
    /**
     * Channel, private group, or IM channel to send message to.
     * Can be an encoded ID, or a name. See link for more details.
     *
     * @see https://api.slack.com/methods/chat.postMessage#channels
     * @param string $channel
     * @throws SlackException
     * @return ChatPostMessage
     * @Required
     */
    public function setChannel($channel)
    {
        if (!is_scalar($channel)) {
            throw new SlackException('Channel should be a scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->channel = $channel;
        
        return $this;
    }

    /**
     * Text of the message to send.
     * See link for an explanation of formatting. This field is usually required, unless you're providing only attachments instead.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#formatting
     * @param string $text
     * @throws SlackException
     * @return ChatPostMessage
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new SlackException('Text should be a scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->text = $text;
        
        return $this;
    }

    /**
     * Change how messages are treated.
     * Defaults to none. See link.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#formatting
     * @param string $parse
     * @throws SlackException
     * @return ChatPostMessage
     */
    public function setParse($parse)
    {
        if (!is_scalar($parse)) {
            throw new SlackException('Parse should be a scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->parse = $parse;
        
        return $this;
    }
    
    /**
     * Find and link channel names and usernames.
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
     * Add an attachment to the message
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
     * Pass true to enable unfurling of primarily text-based content.
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
     * Pass false to disable unfurling of media content.
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
     * Set your bot's user name.
     * Must be used in conjunction with as_user set to false, otherwise ignored. See link.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#authorship
     * @param string $username
     * @return ChatPostMessage
     */
    public function setUsername($username)
    {
        $this->username = $username;
        
        return $this;
    }

    /**
     * Pass true to post the message as the authed user, instead of as a bot.
     * Defaults to false. See link.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#authorship
     * @param bool $asUser
     * @return ChatPostMessage
     */
    public function setAsUser($asUser)
    {
        $this->asUser = $asUser;
        
        return $this;
    }

    /**
     * URL to an image to use as the icon for this message.
     * Must be used in conjunction with as_user set to false, otherwise ignored. See link.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#authorship
     * @param string $iconUrl
     * @return ChatPostMessage
     */
    public function setIconUrl($iconUrl)
    {
        $this->iconUrl = $iconUrl;
        
        return $this;
    }
    
    /**
     * Emoji to use as the icon for this message.
     * Overrides icon_url. Must be used in conjunction with as_user set to false, otherwise ignored. See link.
     *
     * @see https://api.slack.com/methods/chat.postMessage#authorship
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
     * Provide another message's ts value to make this message a reply.
     * Avoid using a reply's ts value; use its parent instead.
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
     * Used in conjunction with threadTs and indicates whether reply should be made visible to everyone in the channel or conversation.
     * Defaults to false.
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
     * Pass false to disable formatting on a non-user message
     * 
     * @see https://api.slack.com/docs/message-formatting
     * @param bool $markdown
     * @return ChatPostMessage
     */
    public function setMrkdwn($markdown)
    {
        $this->mrkdwn = $markdown;
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     * @see SlackAPI\Models\AbstractModels\AbstractPayload::validateRequired()
     */
    public function validateRequired()
    {
        parent::validateRequired();
        
        if ($this->text === null && count($this->attachments) == 0) {
            throw new SlackException('Must provide either text or at least one attachment when sending a chat.postPayload', SlackException::MISSING_REQUIRED_FIELD);
        }
    }
    
}
