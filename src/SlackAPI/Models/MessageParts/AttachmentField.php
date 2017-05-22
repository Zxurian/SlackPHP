<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use Doctrine\Common\Annotations\Annotation\Required;
use JMS\Serializer\Annotation\Type;

/**
 * Class to create new field for attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
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
     * @var string
     * @Type("string")
     * @Required
     */
    protected $title = null;

    /**
     * @var string
     * @Type("string")
     * @Required
     */
    protected $value = null;

    /**
     * @var bool
     * @Type("boolean")
     */
    protected $short = null;

    /**
     * Setter for title
     * 
     * @param string $title
     * @throws \InvalidArgumentException
     * @return AttachmentField
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
     * Setter for value
     * 
     * @param string $value
     * @throws \InvalidArgumentException
     * @return AttachmentField
     */
    public function setValue($value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException('Value should be scalar type');
        }
        
        $this->value = (string)$value;
        
        return $this;
    }

    /**
     * Setter for an optional flag indicating whether the value is short enough to be displayed side-by-side with other values.
     * 
     * @param bool $short
     * @throws \InvalidArgumentException
     * @return AttachmentField
     */
    public function setShort($short)
    {
        if (!is_bool($short)) {
            throw new \InvalidArgumentException('Short should be boolean type');
        }
        
        $this->short = $short;
        
        return $this;
    }
}