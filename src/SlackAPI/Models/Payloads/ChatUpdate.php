<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\Attachment;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use Doctrine\Common\Annotations\Annotation\Required;

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
     * @var string
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
     * @throws SlackException
     * @return ChatUpdate
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
     * Setter for ts of message, that has to be updated
     *
     * @param string $ts
     * @throws SlackException
     * @return ChatUpdate
     */
    public function setTs($ts)
    {
        if (!is_scalar($ts)) {
            throw new SlackException('Ts should be a scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->ts = (string)$ts;
    
        return $this;
    }
    
    /**
     * Setter for text
     *
     * @param string $text
     * @throws SlackException
     * @return ChatUpdate
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new SlackException('Text should be a scalar type', SlackException::NOT_SCALAR);
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
     * @param string $parse
     * @throws SlackException
     * @return ChatUpdate
     */
    public function setParse($parse)
    {
        if (!is_scalar($parse)) {
            throw new SlackException('Parse should be a scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->parse = (string)$parse;
    
        return $this;
    }
    
    /**
     * Setter for linkNames
     *
     * @param bool $linkNames
     * @throws SlackException
     * @return ChatUpdate
     */
    public function setLinkNames($linkNames)
    {
        if (!is_bool($linkNames)) {
            throw new SlackException('LinkNames should be a boolean type', SlackException::NOT_BOOLEAN);
        }
        
        $this->linkNames = $linkNames;
    
        return $this;
    }
    
    /**
     * Setter for asUser
     *
     * @param bool $asUser
     * @throws SlackException
     * @return ChatUpdate
     */
    public function setAsUser($asUser)
    {
        if (!is_bool($asUser)) {
            throw new SlackException('AsUser should be a boolean type', SlackException::NOT_BOOLEAN);
        }
        
        $this->asUser = $asUser;
    
        return $this;
    }
    
}