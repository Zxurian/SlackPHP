<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\MessageParts\Attachment;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use Doctrine\Common\Annotations\Annotation\Required;
use SlackPHP\SlackAPI\Enumerators\Parse;
use SlackPHP\SlackAPI\Enumerators\Method;

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
    const method = Method::chatUpdate;
    
    /**
     * @var string
     * @Required
     */
    protected $ts = null;
    
    /**
     * @var string
     * @Required
     */
    protected $channel = null;
    
    /**
     * @var string
     * @Required
     */
    protected $text = null;
    
    /**
     * @var Attachment[]
     */
    protected $attachments = [];
    
    /**
     * @var Parse
     */
    protected $parse = null;
    
    /**
     * @var bool
     */
    protected $linkNames = null;
    
    /**
     * @var bool
     */
    protected $asUser = null;
    
    /**
     * @var bool
     */
    protected $mrkdwn = null;
    
    /**
     * Setter for channel, where the message should be updated
     *
     * @param string $channel
     * @throws \InvalidArgumentException
     * @return ChatUpdate
     */
    public function setChannel($channel)
    {
        if (!is_scalar($channel)) {
            throw new \InvalidArgumentException('Channel should be a scalar type');
        }
        
        $this->channel = $channel;
        
        return $this;
    }

    /**
     * Setter for ts of message, that has to be updated
     *
     * @param string $ts
     * @throws \InvalidArgumentException
     * @return ChatUpdate
     */
    public function setTs($ts)
    {
        if (!is_scalar($ts)) {
            throw new \InvalidArgumentException('Ts should be a scalar type');
        }
        
        $this->ts = (string)$ts;
    
        return $this;
    }
    
    /**
     * Setter for text
     *
     * @param string $text
     * @throws \InvalidArgumentException
     * @return ChatUpdate
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
     * @param Parse $parse
     * @return ChatUpdate
     */
    public function setParse(Parse $parse)
    {
        $this->parse = $parse->getValue();
    
        return $this;
    }
    
    /**
     * Setter for linkNames
     *
     * @param bool $linkNames
     * @throws \InvalidArgumentException
     * @return ChatUpdate
     */
    public function setLinkNames($linkNames)
    {
        if (!is_bool($linkNames)) {
            throw new \InvalidArgumentException('LinkNames should be a boolean type');
        }
        
        $this->linkNames = $linkNames;
    
        return $this;
    }
    
    /**
     * Setter for asUser
     *
     * @param bool $asUser
     * @throws \InvalidArgumentException
     * @return ChatUpdate
     */
    public function setAsUser($asUser)
    {
        if (!is_bool($asUser)) {
            throw new \InvalidArgumentException('AsUser should be a boolean type');
        }
        
        $this->asUser = $asUser;
    
        return $this;
    }
    
}