<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractMain;

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
class Attachment extends AbstractMain
{
    /**
     * @var string|NULL
     * @Required
     */
    private $fallback = null;
    
    /**
     * @var string|NULL
     */
    private $color = null;
    
    /**
     * @var string|NULL
     */
    private $pretext = null;
    
    /**
     * @var string|NULL
     */
    private $authorName = null;
    
    /**
     * @var string|NULL
     */
    private $authorLink = null;
    
    /**
     * @var string|NULL
     */
    private $authorIcon = null;
    
    /**
     * @var string|NULL
     */
    private $title = null;

    /**
     * @var string|NULL
     */
    private $titleLink = null;

    /**
     * @var string|NULL
     */
    private $text = null;
    
    /**
     * @var AttachmentField[]
     */
    private $fields = [];
    
    /**
     * @var AttachmentAction[]
     */
    private $actions = [];
    
    /**
     * @var string|NULL
     */
    private $imageUrl = null;

    /**
     * @var string|NULL
     */
    private $thumbUrl = null;
    
    /**
     * @var string|NULL
     */
    private $footer = null;
    
    /**
     * @var string|NULL
     */
    private $footerIcon = null;
    
    /**
     * @var string|NULL
     */
    private $ts = null;

    /**
     * @var string|NULL
     */
    private $callbackId = null;
    
    /**
     * @var string|NULL
     */
    private $attachmentType = null;
    
    /**
     * @var Array
     */
    private $mrkdwnIn = [];
    
    /**
     * Setter for fallback
     *
     * @param string $fallback
     */
    public function setFallback($fallback)
    {
        if (!is_scalar($fallback)) {
            throw new SlackException('Fallback should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->fallback = (string)$fallback;
        
        return $this;
    }
    
    /**
     * Setter for color
     *
     * @param string $color
     */
    public function setColor($color)
    {
        if (!is_scalar($color)) {
            throw new SlackException('Color should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->color = (string)$color;
        
        return $this;
    }
    
    /**
     * Setter for pretext
     *
     * @param string $pretext
     */
    public function setPretext($pretext)
    {
        if (!is_scalar($pretext)) {
            throw new SlackException('Pretext should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->pretext = (string)$pretext;
        
        return $this;
    }
    
    /**
     * Setter for authorName
     *
     * @param string $authorName
     */
    public function setAuthorName($authorName)
    {
        if (!is_scalar($authorName)) {
            throw new SlackException('Author name should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->authorName = (string)$authorName;
        
        return $this;
    }
    
    /**
     * Setter for authorLink
     *
     * @param string $authorLink
     */
    public function setAuthorLink($authorLink)
    {
        if (!is_scalar($authorLink)) {
            throw new SlackException('Author link should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->authorLink = (string)$authorLink;
        
        return $this;
    }
    
    /**
     * Setter for authorIcon
     *
     * @param string $authorIcon
     */
    public function setAuthorIcon($authorIcon)
    {
        if (!is_scalar($authorIcon)) {
            throw new SlackException('Author icon should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->authorIcon = (string)$authorIcon;
        
        return $this;
    }
    
    /**
     * Setter for title
     * 
     * @param string $title
     */
    public function setTitle($title)
    {
        if (!is_scalar($title)) {
            throw new SlackException('Title should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->title = (string)$title;
        
        return $this;
    }

    /**
     * Setter for titleLink
     * 
     * @param string $titleLink
     */
    public function setTitleLink($titleLink)
    {
        if (!is_scalar($titleLink)) {
            throw new SlackException('Title link should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->titleLink = (string)$titleLink;
        
        return $this;
    }

    /**
     * Setter for text
     *
     * @param string $text
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new SlackException('Text should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->text = (string)$text;
        
        return $this;
    }
    
    /**
     * Add new AttachmentField to Array
     *
     * @param AttachmentField $field
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
     */
    public function setImageUrl($imageUrl)
    {
        if (!is_scalar($imageUrl)) {
            throw new SlackException('Image url should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->imageUrl = (string)$imageUrl;
        
        return $this;
    }
    
    /**
     * Setter for thumbUrl
     * 
     * @param string $thumbUrl
     */
    public function setThumbUrl($thumbUrl)
    {
        if (!is_scalar($thumbUrl)) {
            throw new SlackException('Thumb url should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->thumbUrl = (string)$thumbUrl;
        
        return $this;
    }
    
    /**
     * Setter for footer
     * 
     * @param string $footer
     */
    public function setFooter($footer)
    {
        if (!is_scalar($footer)) {
            throw new SlackException('Footer should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->footer = (string)$footer;
        
        return $this;
    }
    
    /**
     * Setter for footerIcon
     * 
     * @param string $footerIcon
     */
    public function setFooterIcon($footerIcon)
    {
        if (!is_scalar($footerIcon)) {
            throw new SlackException('Footer icon should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->footerIcon = (string)$footerIcon;
        
        return $this;
    }
    
    /**
     * Setter for ts
     * 
     * @param string $ts
     */
    public function setTs($ts)
    {
        if (!is_scalar($ts)) {
            throw new SlackException('Ts should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->ts = (string)$ts;
        
        return $this;
    }
    
    /**
     * Setter for callbackId
     *
     * @param string $callbackId
     */
    public function setCallbackId($callbackId)
    {
        if (!is_scalar($callbackId)) {
            throw new SlackException('Callback id should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->callbackId = (string)$callbackId;
    
        return $this;
    }
    
    /**
     * Setter for attachmentType
     *
     * @param string $attachmentType
     */
    public function setAttachmentType($attachmentType)
    {
        if (!is_scalar($attachmentType)) {
            throw new SlackException('Attachment type should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->attachmentType = (string)$attachmentType;
    
        return $this;
    }
    
    /**
     * Setter for array of fields, that will use markdown formatting
     * Valid values for array are: pretext, text, fields
     * 
     * @param array Array of fields in attachment that have use markdown formatting
     */
    public function setMrkdwnIn(Array $mrkdwnIn)
    {
        $flag = true;
        $validValues = ["pretext", "text", "fields"];
        $validToSetValues = [];
        $invalidValues = [];
        
        foreach ($mrkdwnIn as $value) {
            if (in_array($value, $validValues)) {
                $validToSetValues[] = $value;
            } else {
                $flag = false;
                $invalidValues[] = $value;
            }
        }
        
        if (!$flag) {
            throw new SlackException('Invalid values provided for mrkdwnIn property: '.implode(', ', $invalidValues), SlackException::INVALID_MRKDWN_IN_VALUES);
        }
        
        if (count($validToSetValues) > 0) {
            $this->mrkdwnIn = $validToSetValues;
        }
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     * @see SlackAPI\Models\AbstractModels\AbstractMain::validateRequired()
     */
    public function validateRequired()
    {
        parent::validateRequired();
    
        if (count($this->actions) > 0 && $this->callbackId === null) {
            throw new SlackException('Must provide callback id, if buttons set in attachments payload', SlackException::MISSING_REQUIRED_FIELD);
        }
    }
}