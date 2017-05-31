<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Models\MessageParts\Attachment;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Enumerators\Parse;
use SlackPHP\SlackAPI\Enumerators\Method;
use SlackPHP\SlackAPI\Models\MessageParts\Message;

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
 * @method Parse getParse()
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
    const METHOD = METHOD::CHAT_POST_MESSAGE;
    
    /** @var string|null */
    protected $channel = null;

    /** @var string|null $text */
    protected $text = null;

    /** @var Parse $parse */
    protected $parse;
    
    /** @var bool|null */
    protected $linkNames = null;
    
    /** @var Attachment[] */
    protected $attachments = [];
    
    /** @var bool */
    protected $unfurlLinks = false;
    
    /** @var bool */
    protected $unfurlMedia = true;
    
    /** @var string|null */
    protected $username = null;

    /** @var bool|null */
    protected $asUser = null;

    /** @var string|null */
    protected $iconUrl = null;
    
    /** @var string|null */
    protected $iconEmoji = null;
    
    /** @var string|null */
    protected $threadTs = null;

    /** @var bool */
    protected $replyBroadcast = false;
    
    /** @var bool|null */
    protected $mrkdwn = null;
    
    public function __construct()
    {
        $this->parse = Parse::FULL();
    }
    
    /**
     * Channel, private group, or IM channel to send message to.
     * Can be an encoded ID, or a name. See link for more details.
     *
     * @see https://api.slack.com/methods/chat.postMessage#channels
     * @param string $channel
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setChannel($channel)
    {
        if (!is_scalar($channel)) {
            throw new \InvalidArgumentException('Channel should be a scalar type');
        }
        
        $this->channel = (string)$channel;
        
        return $this;
    }

    /**
     * Text of the message to send.
     * See link for an explanation of formatting. This field is usually
     * required, unless you're providing only attachments instead.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#formatting
     * @param string $text
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new \InvalidArgumentException('Text should be a scalar type');
        }
        
        $this->text = (string)$text;
        
        return $this;
    }

    /**
     * Change how messages are treated.
     * Defaults to none. See link.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#formatting
     * @param Parse $parse
     * @return ChatPostMessage
     */
    public function setParse(Parse $parse)
    {
        $this->parse = $parse;
        
        return $this;
    }
    
    /**
     * Find and link channel names and usernames.
     * 
     * @param bool $linkNames
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setLinkNames($linkNames)
    {
        if (!is_bool($linkNames)) {
            throw new \InvalidArgumentException('Link names should be a boolean type');
        }
        
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
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setUnfurlLinks($unfurlLinks)
    {
        if (!is_bool($unfurlLinks)) {
            throw new \InvalidArgumentException('UnfurlLinks should be a boolean type');
        }
        
        $this->unfurlLinks = $unfurlLinks;
        
        return $this;
    }
    
    /**
     * Pass false to disable unfurling of media content.
     *
     * @param bool $unfurlMedia
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setUnfurlMedia($unfurlMedia)
    {
        if (!is_bool($unfurlMedia)) {
            throw new \InvalidArgumentException('UnfurlMedia should be a boolean type');
        }
        
        $this->unfurlMedia = $unfurlMedia;
        
        return $this;
    }
    
    /**
     * Set your bot's user name.
     * Must be used in conjunction with as_user set to false, otherwise ignored. See link.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#authorship
     * @param string $username
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setUsername($username)
    {
        if (!is_scalar($username)) {
            throw new \InvalidArgumentException('Username should be a scalar type');
        }
        
        $this->username = (string)$username;
        
        return $this;
    }

    /**
     * Pass true to post the message as the authed user, instead of as a bot.
     * Defaults to false. See link.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#authorship
     * @param bool $asUser
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setAsUser($asUser)
    {
        if (!is_bool($asUser)) {
            throw new \InvalidArgumentException('AsUser should be a boolean type');
        }
        
        $this->asUser = $asUser;
        
        return $this;
    }

    /**
     * URL to an image to use as the icon for this message.
     * Must be used in conjunction with as_user set to false, otherwise ignored. See link.
     * 
     * @see https://api.slack.com/methods/chat.postMessage#authorship
     * @param string $iconUrl
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setIconUrl($iconUrl)
    {
        if (!is_scalar($iconUrl) || filter_var($iconUrl, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('IconUrl should be a valid url string');
        }
        
        $this->iconUrl = (string)$iconUrl;
        
        return $this;
    }
    
    /**
     * Emoji to use as the icon for this message.
     * Overrides icon_url. Must be used in conjunction with as_user set to false, otherwise ignored. See link.
     *
     * @see https://api.slack.com/methods/chat.postMessage#authorship
     * @param string $iconEmoji
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setIconEmoji($iconEmoji)
    {
        if (!is_scalar($iconEmoji)) {
            throw new \InvalidArgumentException('IconEmoji should be a scalar type');
        }
        
        if (substr($iconEmoji, 0, 1) !== ':') {
            $iconEmoji = ':'.$iconEmoji;
        }
        
        if (substr($iconEmoji, -1, 1) !== ':') {
            $iconEmoji = $iconEmoji.':';
        }

        $this->iconEmoji = $iconEmoji;
        
        return $this;
    }

    /**
     * Provide another message's ts value to make this message a reply.
     * Avoid using a reply's ts value; use its parent instead.
     * 
     * @param string $threadTs
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setThreadTs($threadTs)
    {
        if (!is_scalar($threadTs)) {
            throw new \InvalidArgumentException('ThreadTs should be a scalar type');
        }
        
        $this->threadTs = (string)$threadTs;
        
        return $this;
    }
    
    /**
     * Used in conjunction with threadTs and indicates whether reply should be made visible to everyone in the channel or conversation.
     * Defaults to false.
     * 
     * @param bool $replyBroadcast
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setReplyBroadcast($replyBroadcast)
    {
        if (!is_bool($replyBroadcast)) {
            throw new \InvalidArgumentException('ReplyBroadcast should be a boolean type');
        }
        
        $this->replyBroadcast = $replyBroadcast;
        
        return $this;
    }
    
    /**
     * Pass false to disable formatting on a non-user message
     * 
     * @see https://api.slack.com/docs/message-formatting
     * @param bool $markdown
     * @throws \InvalidArgumentException
     * @return ChatPostMessage
     */
    public function setMrkdwn($markdown)
    {
        if (!is_bool($markdown)) {
            throw new \InvalidArgumentException('Mrkdwn should be a boolean type');
        }
        
        $this->mrkdwn = $markdown;
        
        return $this;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Models\Abstracts\PayloadInterface::validatePayload()
     */
    public function validatePayload()
    {
        if ($this->channel === null) {
            throw new SlackException('Must provide Channel with a chat.postMessage payload', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->text === null && count($this->attachments) == 0) {
            throw new SlackException('Must provide either text or at least one attachment when sending a chat.postMessage', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->asUser === true && $this->username !== null) {
            throw new SlackException('asUser cannot be set to true if providing username', SlackException::AS_USER_SET_WITH_USERNAME);
        }
        
        if ($this->asUser === true && $this->iconUrl !== null) {
            throw new SlackException('asUser cannot be set to true if providing icon url', SlackException::AS_USER_SET_WITH_ICON_URL);
        }
        
        if ($this->asUser === true && $this->iconEmoji !== null) {
            throw new SlackException('asUser cannot be set to true if providing icon emoji', SlackException::AS_USER_SET_WITH_ICON_EMOJI);
        }
    }
    
    /**
     * Create a ChatPostMessage from a Message model
     * This will create a ChatPostMessage model using values from the already
     * created Message model since most of the fields are the same.
     * 
     * @param Message $message
     * @return ChatPostMessage
     */
    static function createFromMessage(Message $message)
    {
        $chatPostMessage = new self();
        
        $fieldsToCopy = [
            'text',
            'channel',
            'attachments',
            'threadTs',
        ];
        foreach($fieldsToCopy as $field) {
            $methodName = 'get'.strtoupper(substr($field, 0, 1)).substr($field, 1);
            $chatPostMessage->{$field} = $message->$methodName();
        }
        
        return $chatPostMessage;
    }
}
