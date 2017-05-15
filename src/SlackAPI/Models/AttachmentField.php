<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractMain;

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
class AttachmentField extends AbstractMain
{
    /**
     * @var string|NULL
     * @Required
     */
    private $title = null;

    /**
     * @var string|NULL
     * @Required
     */
    private $value = null;

    /**
     * @var bool|NULL
     */
    private $short = null;

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
     * Setter for value
     * 
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        
        return $this;
    }

    /**
     * Setter for an optional flag indicating whether the value is short enough to be displayed side-by-side with other values.
     * 
     * @param bool $short
     */
    public function setShort($short)
    {
        $this->short = $short;
        
        return $this;
    }
}