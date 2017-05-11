<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;

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
     * @throws SlackException
     * @param string $text
     * @return ActionOption
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
        if (!is_scalar($value)) {
            throw new SlackException('Value should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->value = (string)$value;
        
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
        if (!is_scalar($description)) {
            throw new SlackException('Description should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->description = (string)$description;
    
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