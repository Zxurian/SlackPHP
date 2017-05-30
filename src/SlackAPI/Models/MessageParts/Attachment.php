<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use SlackPHP\SlackAPI\Enumerators\MrkdwnIn;
use SlackPHP\SlackAPI\Models\MessageParts\AttachmentField;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Enumerators\AttachmentColor;

/**
 * Class to create Attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
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
 * @method integer getTs()
 * @method string getCallbackId()
 * @method string getAttachmentType()
 * @method MrkdwnIn[] getMrkdwnIn()
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
     * @var int
     * @Type("integer")
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
     * A plaintext message displayed to users using an interface that does not support attachments or interactive messages.
     * Consider leaving a URL pointing to your service if the potential
     * message actions are representable outside of Slack. Otherwise, let
     * folks know what they are missing.
     *
     * @param string $fallback
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setFallback($fallback)
    {
        if (!is_scalar($fallback)) {
            throw new \InvalidArgumentException('Fallback should be scalar');
        }
        
        $this->fallback = (string)$fallback;
        
        return $this;
    }
    
    /**
     * Used to visually distinguish an attachment from other messages.
     * Accepts hex values or an AttachmentColor enum as documented in attaching
     * content to messages. Use sparingly and according to best practices.
     *
     * @param string $color
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setColor($color)
    {
        if ($color instanceof AttachmentColor) {
            $color = $color->getValue();
        }
        
        if (!is_scalar($color)) {
            throw new \InvalidArgumentException('Color should either be a hex value or an AttachmentColor enum');
        }
        
        $color = trim($color, '#');
        if (!ctype_xdigit($color) || (ctype_xdigit($color) && strlen($color) !== 6 && strlen($color) !== 3)) {
            throw new \InvalidArgumentException('Color should either be a hex value or an AttachmentColor Enum');
        }
        
        $this->color = '#'.$color;
        
        return $this;
    }
    
    /**
     * This is optional text that appears above the message attachment block.
     *
     * @param string $pretext
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setPretext($pretext)
    {
        if (!is_scalar($pretext)) {
            throw new \InvalidArgumentException('Pretext should be scalar');
        }
        
        $this->pretext = (string)$pretext;
        
        return $this;
    }
    
    /**
     * Small text used to display the author's name.
     *
     * @param string $authorName
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setAuthorName($authorName)
    {
        if (!is_scalar($authorName)) {
            throw new \InvalidArgumentException('Author name should be scalar');
        }
        
        $this->authorName = (string)$authorName;
        
        return $this;
    }
    
    /**
     * A valid URL that will hyperlink the author_name text mentioned above.
     * Will only work if author_name is present.
     *
     * @param string $authorLink
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setAuthorLink($authorLink)
    {
        if (!is_scalar($authorLink) || filter_var($authorLink, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Author link should be a valid URL');
        }
        
        $this->authorLink = (string)$authorLink;
        
        return $this;
    }
    
    /**
     * A valid URL that displays a small 16x16px image to the left of the author_name text.
     * Will only work if author_name is present.
     *
     * @param string $authorIcon
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setAuthorIcon($authorIcon)
    {
        if (!is_scalar($authorIcon) || filter_var($authorIcon, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Author icon should be a valid URL');
        }
        
        $this->authorIcon = (string)$authorIcon;
        
        return $this;
    }
    
    /**
     * The title is displayed as larger, bold text near the top of a message attachment.
     * 
     * @param string $title
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setTitle($title)
    {
        if (!is_scalar($title)) {
            throw new \InvalidArgumentException('Title should be scalar');
        }
        
        $this->title = (string)$title;
        
        return $this;
    }

    /**
     * By passing a valid URL in the title_link parameter, the title text will be hyperlinked.
     * 
     * @param string $titleLink
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setTitleLink($titleLink)
    {
        if (!is_scalar($titleLink) || filter_var($titleLink, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Title link should be a valid URL');
        }
        
        $this->titleLink = (string)$titleLink;
        
        return $this;
    }

    /**
     * This is the main text in a message attachment, and can contain standard message markup.
     * The content will automatically collapse if it contains 700+ characters
     * or 5+ linebreaks, and will display a "Show more..." link to expand the
     * content. Links posted in the text field will not unfurl.
     *
     * @param string $text
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new \InvalidArgumentException('Text should be scalar');
        }
        
        $this->text = (string)$text;
        
        return $this;
    }
    
    /**
     * Add new Attachmen tField
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
     * Add new Attachment Action
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
     * A valid URL to an image file that will be displayed inside a message attachment.
     * We currently support the following formats: GIF, JPEG, PNG, and BMP.
     * Large images will be resized to a maximum width of 400px or a maximum
     * height of 500px, while still maintaining the original aspect ratio.
     * 
     * @param string $imageUrl
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setImageUrl($imageUrl)
    {
        if (!is_scalar($imageUrl) || filter_var($imageUrl, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Image url should be a valid URL');
        }
        
        $this->imageUrl = (string)$imageUrl;
        
        return $this;
    }
    
    /**
     * A valid URL to an image file that will be displayed as a thumbnail on the right side of a message attachment.
     * We currently support the following formats: GIF, JPEG, PNG, and BMP.
     * The thumbnail's longest dimension will be scaled down to 75px while
     * maintaining the aspect ratio of the image. The filesize of the image
     * must also be less than 500 KB. For best results, please use images
     * that are already 75px by 75px.
     * 
     * @param string $thumbUrl
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setThumbUrl($thumbUrl)
    {
        if (!is_scalar($thumbUrl) || filter_var($thumbUrl, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Thumb url should be a valid URL');
        }
        
        $this->thumbUrl = (string)$thumbUrl;
        
        return $this;
    }
    
    /**
     * Add some brief text to help contextualize and identify an attachment.
     * Limited to 300 characters, and may be truncated further when displayed
     * to users in environments with limited screen real estate.
     * 
     * @param string $footer
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setFooter($footer)
    {
        if (!is_scalar($footer)) {
            throw new \InvalidArgumentException('Footer should be scalar');
        }
        
        $this->footer = (string)$footer;
        
        return $this;
    }
    
    /**
     * To render a small icon beside your footer text, provide a publicly accessible URL string in the footer_icon field.
     * You must also provide a footer for the field to be recognized. We'll
     * render what you provide at 16px by 16px. It's best to use an image
     * that is similarly sized.
     * 
     * @param string $footerIcon
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setFooterIcon($footerIcon)
    {
        if (!is_scalar($footerIcon) || filter_var($footerIcon, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Footer icon should be a valid URL');
        }
        
        $this->footerIcon = (string)$footerIcon;
        
        return $this;
    }
    
    /**
     * By providing the ts field with an integer value in "epoch time", the attachment will display an additional timestamp value as part of the attachment's footer.
     * 
     * @param \DateTime $ts
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setTs(\DateTime $ts)
    {
        $this->ts = $ts->format('U');
        
        return $this;
    }
    
    /**
     * The provided string will act as a unique identifier for the collection of buttons within the attachment.
     * It will be sent back to your message button action URL with each
     * invoked action. This field is required when the attachment contains
     * message buttons. It is key to identifying the interaction you're
     * working with.
     *
     * @param string $callbackId
     * @throws \InvalidArgumentException
     * @return Attachment
     */
    public function setCallbackId($callbackId)
    {
        if (!is_scalar($callbackId)) {
            throw new \InvalidArgumentException('Callback id should be scalar');
        }
        
        $this->callbackId = (string)$callbackId;
    
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
            if (!array_key_exists($value->getValue(), $this->mrkdwnIn)) {
                $this->mrkdwnIn[$value->getValue()] = $value;
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
        
        if ($this->footerIcon !== null && $this->footer === null) {
            throw new SlackException('Can’t use footerIcon without footer', SlackException::MISSING_REQUIRED_FIELD);
        }
    }
}