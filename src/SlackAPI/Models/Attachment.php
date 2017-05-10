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
        $this->fallback = $fallback;
        
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
        $this->color = $color;
        
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
        $this->pretext = $pretext;
        
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
        $this->authorName = $authorName;
        
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
        $this->authorLink = $authorLink;
        
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
        $this->authorIcon = $authorIcon;
        
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
        $this->title = $title;
        
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
        $this->titleLink = $titleLink;
        
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
        if (count($this->actions) > 5) {
            throw new SlackException(' A maximum of 5 actions per attachment may be provided', SlackException::MORE_THAN_5_ACTIONS_IN_ATTACHMENT);
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
        $this->imageUrl = $imageUrl;
        
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
        $this->thumbUrl = $thumbUrl;
        
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
        $this->footer = $footer;
        
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
        $this->footerIcon = $footerIcon;
        
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
        $this->ts = $ts;
        
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
        $this->callbackId = $callbackId;
    
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
        $this->attachmentType = $attachmentType;
    
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
     * Setter for array of fields, that use markdown formatting
     * 
     * @param array Array of fields in attachment that have use markdown formatting
     */
    public function setMrkdwnIn(Array $mrkdwnIn)
    {
        $this->mrkdwnIn = $mrkdwnIn;
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