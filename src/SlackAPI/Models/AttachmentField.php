<?php

namespace SlackPHP\SlackAPI\Models;

/**
 * Class to create new field for attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class AttachmentField
{
    /**
     * @var string|NULL
     */
    private $title = null;

    /**
     * @var string|NULL
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
     * Getter for title
     * 
     * @return string|NULL
     */
    public function getTitle()
    {
        return $this->title;
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
     * Getter for value
     * 
     * @return string|NULL
     */
    public function getValue()
    {
        return $this->value;
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

    /**
     * Getter for short flag
     * 
     * @return bool|NULL
     */
    public function getShort()
    {
        return $this->short;
    }
}