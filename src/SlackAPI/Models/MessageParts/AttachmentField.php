<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use JMS\Serializer\Annotation\Type;

/**
 * Class to create new field for attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/docs/interactive-message-field-guide#attachment_fields
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getTitle()
 * @method string getValue()
 * @method bool getShort()
 */
class AttachmentField extends AbstractModel
{
    /**
     * @var string|null
     * @Type("string")
     */
    protected $title = null;

    /**
     * @var string|null
     * @Type("SlackText")
     */
    protected $value = null;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $short = null;

    /**
     * Shown as a bold heading above the value text.
     * It cannot contain markup and will be escaped for you.
     * 
     * @param string $title
     * @throws \InvalidArgumentException
     * @return AttachmentField
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
     * The text value of the field.
     * It may contain standard message markup and must be escaped as normal.
     * May be multi-line.
     * 
     * @param string $value
     * @throws \InvalidArgumentException
     * @return AttachmentField
     */
    public function setValue($value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException('Value should be scalar');
        }
        
        $this->value = (string)$value;
        
        return $this;
    }

    /**
     * An optional flag indicating whether the value is short enough to be displayed side-by-side with other values.
     * 
     * @param bool $short
     * @throws \InvalidArgumentException
     * @return AttachmentField
     */
    public function setShort($short)
    {
        if (!is_bool($short)) {
            throw new \InvalidArgumentException('Short should be boolean');
        }
        
        $this->short = $short;
        
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    public function validateModel(){}

}