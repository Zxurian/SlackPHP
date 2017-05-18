<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractModel;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use Doctrine\Common\Annotations\Annotation\Required;

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
     * @Required
     */
    protected $title = null;

    /**
     * @var string
     * @Required
     */
    protected $value = null;

    /**
     * @var bool
     */
    protected $short = null;

    /**
     * Setter for title
     * 
     * @param string $title
     * @throws SlackException
     * @return AttachmentField
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
     * Setter for value
     * 
     * @param string $value
     * @throws SlackException
     * @return AttachmentField
     */
    public function setValue($value)
    {
        if (!is_scalar($value)) {
            throw new SlackException('Value should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->value = (string)$value;
        
        return $this;
    }

    /**
     * Setter for an optional flag indicating whether the value is short enough to be displayed side-by-side with other values.
     * 
     * @param bool $short
     * @throws SlackException
     * @return AttachmentField
     */
    public function setShort($short)
    {
        if (!is_bool($short)) {
            throw new SlackException('Short should be boolean type', SlackException::NOT_BOOLEAN);
        }
        
        $this->short = $short;
        
        return $this;
    }
}