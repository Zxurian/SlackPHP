<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use SlackPHP\SlackAPI\Enumerators\MrkdwnIn;
use SlackPHP\SlackAPI\Models\MessageParts\AttachmentField;
use JMS\Serializer\Annotation\Type;

/**
 * Class to create Attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/docs/interactive-message-field-guide#attachment_fields
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getFallback()
 * @method string getColor()
 * @method string getPretext()
 * @method string getAuthorName()
 * @method string getAuthorLink()
 * @method string getAuthorIcon()
 * @method string getTitle()
 * @method string getTitleLink()
 * @method string getText()
 * @method AttachmentField[] getFields()
 * @method AttachmentAction[] getActions()
 * @method string getImageUrl()
 * @method string getThumbUrl()
 * @method string getFooter()
 * @method string getFooterIcon()
 * @method string getTs()
 * @method string getCallbackId()
 * @method string getAttachmentType()
 * @method string getMrkdwnIn()
 */
class Attachment extends AbstractModel
{
    /**
     * @var string
     * @Type("string")
     */
    protected $fallback = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $color = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $pretext = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $authorName = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $authorLink = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $authorIcon = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $title = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $titleLink = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $text = null;
    
    /**
     * @var AttachmentField[]
     * @Type("array<SlackPHP\SlackAPI\Models\MessageParts\AttachmentField>")
     */
    protected $fields = [];
    
    /**
     * @var AttachmentAction[]
     * @Type("array<SlackPHP\SlackAPI\Models\MessageParts\AttachmentAction>")
     */
    protected $actions = [];
    
    /**
     * @var string
     * @Type("string")
     */
    protected $imageUrl = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $thumbUrl = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $footer = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $footerIcon = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $ts = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $callbackId = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $attachmentType = 'default';
    
    /**
     * @var array
     * @Type("array<string>")
     */
    protected $mrkdwnIn = [];
    
    /**
     * Setter for fallback
     *
     * @param string $fallback
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setFallback($fallback)
    {
        if (!is_scalar($fallback)) {
            throw new \InvalidArgumentException('Fallback should be scalar type');
        }
        
        $this->fallback = (string)$fallback;
        
        return $this;
    }
    
    /**
     * Setter for color
     *
     * @param string $color
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setColor($color)
    {
        if (!is_scalar($color)) {
            throw new \InvalidArgumentException('Color should be scalar type');
        }
        
        $this->color = (string)$color;
        
        return $this;
    }
    
    /**
     * Setter for pretext
     *
     * @param string $pretext
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setPretext($pretext)
    {
        if (!is_scalar($pretext)) {
            throw new \InvalidArgumentException('Pretext should be scalar type');
        }
        
        $this->pretext = (string)$pretext;
        
        return $this;
    }
    
    /**
     * Setter for authorName
     *
     * @param string $authorName
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setAuthorName($authorName)
    {
        if (!is_scalar($authorName)) {
            throw new \InvalidArgumentException('Author name should be scalar type');
        }
        
        $this->authorName = (string)$authorName;
        
        return $this;
    }
    
    /**
     * Setter for authorLink
     *
     * @param string $authorLink
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setAuthorLink($authorLink)
    {
        if (!is_scalar($authorLink)) {
            throw new \InvalidArgumentException('Author link should be scalar type');
        }
        
        $this->authorLink = (string)$authorLink;
        
        return $this;
    }
    
    /**
     * Setter for authorIcon
     *
     * @param string $authorIcon
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setAuthorIcon($authorIcon)
    {
        if (!is_scalar($authorIcon)) {
            throw new \InvalidArgumentException('Author icon should be scalar type');
        }
        
        $this->authorIcon = (string)$authorIcon;
        
        return $this;
    }
    
    /**
     * Setter for title
     * 
     * @param string $title
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setTitle($title)
    {
        if (!is_scalar($title)) {
            throw new \InvalidArgumentException('Title should be scalar type');
        }
        
        $this->title = (string)$title;
        
        return $this;
    }

    /**
     * Setter for titleLink
     * 
     * @param string $titleLink
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setTitleLink($titleLink)
    {
        if (!is_scalar($titleLink)) {
            throw new \InvalidArgumentException('Title link should be scalar type');
        }
        
        $this->titleLink = (string)$titleLink;
        
        return $this;
    }

    /**
     * Setter for text
     *
     * @param string $text
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new \InvalidArgumentException('Text should be scalar type');
        }
        
        $this->text = (string)$text;
        
        return $this;
    }
    
    /**
     * Add new AttachmentField to Array
     *
     * @param AttachmentField $field
     * @return Attachment
     */
    public function addField(AttachmentField $field)
    {
        $this->fields[] = $field;
        
        return $this;
    }
    
    /**
     * Add new AttachmentAction to Array
     *
     * @param AttachmentAction $field
     * @throws SlackException
     * @return Attachment
     */
    public function addAction(AttachmentAction $action)
    {
        if (count($this->actions) >= 5) {
            throw new SlackException('A maximum of 5 actions per attachment can be provided', SlackException::MORE_THAN_5_ACTIONS_IN_ATTACHMENT);
        }
        
        $this->actions[] = $action;
    
        return $this;
    }
    
    /**
     * Setter for imageUrl
     * 
     * @param string $imageUrl
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setImageUrl($imageUrl)
    {
        if (!is_scalar($imageUrl)) {
            throw new \InvalidArgumentException('Image url should be scalar type');
        }
        
        $this->imageUrl = (string)$imageUrl;
        
        return $this;
    }
    
    /**
     * Setter for thumbUrl
     * 
     * @param string $thumbUrl
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setThumbUrl($thumbUrl)
    {
        if (!is_scalar($thumbUrl)) {
            throw new \InvalidArgumentException('Thumb url should be scalar type');
        }
        
        $this->thumbUrl = (string)$thumbUrl;
        
        return $this;
    }
    
    /**
     * Setter for footer
     * 
     * @param string $footer
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setFooter($footer)
    {
        if (!is_scalar($footer)) {
            throw new \InvalidArgumentException('Footer should be scalar type');
        }
        
        $this->footer = (string)$footer;
        
        return $this;
    }
    
    /**
     * Setter for footerIcon
     * 
     * @param string $footerIcon
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setFooterIcon($footerIcon)
    {
        if (!is_scalar($footerIcon)) {
            throw new \InvalidArgumentException('Footer icon should be scalar type');
        }
        
        $this->footerIcon = (string)$footerIcon;
        
        return $this;
    }
    
    /**
     * Setter for ts
     * 
     * @param string $ts
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setTs($ts)
    {
        if (!is_scalar($ts)) {
            throw new \InvalidArgumentException('Ts should be scalar type');
        }
        
        $this->ts = (string)$ts;
        
        return $this;
    }
    
    /**
     * Setter for callbackId
     *
     * @param string $callbackId
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setCallbackId($callbackId)
    {
        if (!is_scalar($callbackId)) {
            throw new \InvalidArgumentException('Callback id should be scalar type');
        }
        
        $this->callbackId = (string)$callbackId;
    
        return $this;
    }
    
    /**
     * Setter for attachmentType
     *
     * @param string $attachmentType
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setAttachmentType($attachmentType)
    {
        if (!is_scalar($attachmentType)) {
            throw new \InvalidArgumentException('Attachment type should be scalar type');
        }
        
        $this->attachmentType = (string)$attachmentType;
    
        return $this;
    }
    
    /**
     * Setter for array of fields, that will use markdown formatting
     * Valid values for array are: pretext, text, fields
     * 
     * @param MrkdwnIn|MrkdwnIn[] value to add to the array
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function addMrkdwnIn($mrkdwnIn)
    {
        if (!is_array($mrkdwnIn)) {
            $mrkdwnIn = [ $mrkdwnIn ];
        }
        
        foreach ($mrkdwnIn as $value) {
            if (!$value instanceof MrkdwnIn) {
                throw new \InvalidArgumentException('Must provide MrkDwnIn object to Attachment::addMrkdwnIn()');
            }
        }
        
        foreach ($mrkdwnIn as $value) {
            if (!in_array($value->getValue(), $this->mrkdwnIn)) {
                $this->mrkdwnIn[] = $value->getValue();
            }
        }
        
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    public function validateModel()
    {
        if ($this->fallback === null) {
            throw new SlackException('fallback property cannot be empty', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if (count($this->actions) > 0 && $this->callbackId === null) {
            throw new SlackException('Must provide callback_id if using actions', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->authorLink !== null && $this->authorName === null) {
            throw new SlackException('Can’t use authorLink if authorName is not provided', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->authorIcon !== null && $this->authorName === null) {
            throw new SlackException('Can’t use authorIcon if authorName is not provided', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->footer !== null && strlen($this->footer) > 300) {
            throw new SlackException('footer should be less that 300 characters', SlackException::MORE_THAN_300_CHARACTERS);
        }
        
        if ($this->footerIcon !== null && $this->footer === null) {
            throw new SlackException('Can’t use footerIcon without footer', SlackException::MISSING_REQUIRED_FIELD);
        }
    }
}