<?php

namespace SlackPHP\SlackAPI\Models;

/**
 * Class to create new option for action
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ActionOption
{
    /**
     * @var string|NULL
     */
    private $text = null;
    
    /**
     * @var string|NULL
     */
    private $value = null;
    
    /**
     * @var string|NULL
     */
    private $description = null;
    /**
     * Setter for text
     * 
     * @param string $text
     * @return ActionOption
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
     * Setter for value
     * 
     * @param string $value
     * @return ActionOption
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
     * Setter for description
     *
     * @param string $description
     * @return ActionOption
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }
    
    /**
     * Getter for description
     *
     * @return string|NULL
     */
    public function getDescription()
    {
        return $this->description;
    }
}