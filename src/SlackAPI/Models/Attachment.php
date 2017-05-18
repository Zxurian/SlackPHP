<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractModel;
use Doctrine\Common\Annotations\Annotation\Required;

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
     * @Required
     */
    protected $fallback = null;
    
    /**
     * @var string
     */
    protected $color = null;
    
    /**
     * @var string
     */
    protected $pretext = null;
    
    /**
     * @var string
     */
    protected $authorName = null;
    
    /**
     * @var string
     */
    protected $authorLink = null;
    
    /**
     * @var string
     */
    protected $authorIcon = null;
    
    /**
     * @var string
     */
    protected $title = null;

    /**
     * @var string
     */
    protected $titleLink = null;

    /**
     * @var string
     */
    protected $text = null;
    
    /**
     * @var AttachmentField[]
     */
    protected $fields = [];
    
    /**
     * @var AttachmentAction[]
     */
    protected $actions = [];
    
    /**
     * @var string
     */
    protected $imageUrl = null;

    /**
     * @var string
     */
    protected $thumbUrl = null;
    
    /**
     * @var string
     */
    protected $footer = null;
    
    /**
     * @var string
     */
    protected $footerIcon = null;
    
    /**
     * @var string
     */
    protected $ts = null;

    /**
     * @var string
     */
    protected $callbackId = null;
    
    /**
     * @var string
     */
    protected $attachmentType = null;
    
    /**
     * @var Array
     */
    protected $mrkdwnIn = [];
    
    /**
     * Setter for fallback
     *
     * @param string $fallback
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @throws SlackException
     * @return Attachment
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
     * @see SlackAPI\Models\AbstractModels\AbstractModel::validateRequired()
     */
    public function validateRequired()
    {
        parent::validateRequired();
    
        if (count($this->actions) > 0 && $this->callbackId === null) {
            throw new SlackException('Must provide callback id, if actions added to attachment payload', SlackException::MISSING_REQUIRED_FIELD);
        }
    }
}