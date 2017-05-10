<?php

namespace SlackPHP\SlackAPI\Models;

/**
 * Class for confirm action buttons
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ActionConfirm
{
    /**
     * @var string|NULL
     */
    private $title = null;

    /**
     * @var string|NULL
     */
    private $text = null;

    /**
     * @var string|NULL
     */
    private $okText = null;
    
    /**
     * @var string|NULL
     */
    private $dismissText = null;

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
     * Setter for okText
     *
     * @param string $okText
     */
    public function setOkText($okText)
    {
        $this->okText = $okText;
    
        return $this;
    }
    
    /**
     * Getter for okText
     *
     * @return string|NULL
     */
    public function getOkText()
    {
        return $this->okText;
    }
    
    /**
     * Setter for dismissText
     *
     * @param string $dismissText
     */
    public function setDismissText($dismissText)
    {
        $this->dismissText = $dismissText;
    
        return $this;
    }
    
    /**
     * Getter for dismissText
     *
     * @return string|NULL
     */
    public function getDismissText()
    {
        return $this->dismissText;
    }
}