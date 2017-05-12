<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class to create Attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class Attachment
{
    /**
     * @var string|NULL
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
     * Getter for fallback
     *
     * @return string|NULL
     */
    public function getFallback()
    {
        return $this->fallback;
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
     * Getter for color
     *
     * @return string|NULL
     */
    public function getColor()
    {
        return $this->color;
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
     * Getter for pretext
     *
     * @return string|NULL
     */
    public function getPretext()
    {
        return $this->pretext;
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
     * Getter for authorName
     *
     * @return string|NULL
     */
    public function getAuthorName()
    {
        return $this->authorName;
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
     * Getter for authorLink
     *
     * @return string|NULL
     */
    public function getAuthorLink()
    {
        return $this->authorLink;
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
     * Getter for authorIcon
     *
     * @return string|NULL
     */
    public function getAuthorIcon()
    {
        return $this->authorIcon;
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
     * Getter for title
     * 
     * @return string|NULL
     */
    public function getTitle()
    {
        return $this->title;
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
     * Getter for titleLink
     * 
     * @return string|NULL
     */
    public function getTitleLink()
    {
        return $this->titleLink;
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
     * Getter for text
     *
     * @return string|NULL
     */
    public function getText()
    {
        return $this->text;
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
     * Getter for fields
     *
     * @return AttachmentField[]
     */
    public function getFields()
    {
        return $this->fields;
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
     * Getter for actions
     *
     * @return AttachmentAction[]
     */
    public function getActions()
    {
        return $this->actions;
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
     * Getter for imageUrl
     * 
     * @return string|NULL
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
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
     * Getter for thumbUrl
     * 
     * @return string|NULL
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
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
     * Getter for footer
     * 
     * @return string|NULL
     */
    public function getFooter()
    {
        return $this->footer;
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
     * Getter for footerIcon
     * 
     * @return string|NULL
     */
    public function getFooterIcon()
    {
        return $this->footerIcon;
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
     * Getter for ts
     * 
     * @return string|NULL
     */
    public function getTs()
    {
        return $this->ts;
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
     * Getter for callbackId
     *
     * @return string|NULL
     */
    public function getCallbackId()
    {
        return $this->callbackId;
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
     * Getter for attachmentType
     *
     * @return string|NULL
     */
    public function getAttachmentType()
    {
        return $this->attachmentType;
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
     * Getter for array of markdown fields
     * 
     * @return Array
     */
    public function getMrkdwnIn()
    {
        return $this->mrkdwnIn;
    }
}