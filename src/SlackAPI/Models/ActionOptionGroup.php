<?php

namespace SlackPHP\SlackAPI\Models;

/**
 * Class to create new option group in action
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ActionOptionGroup
{
    /**
     * @var string|NULL
     */
    private $text = null;
    
    /**
     * @var ActionOption[] 
     */
    private $options = [];
    
    /**
     * Setter for text
     * 
     * @param string $text
     * @return ActionOptionGroup
     */
    public function setText($text)
    {
        $this->text = $text;
        
        return $this;
    }
    
    /**
     * Getter for text
     * 
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * Add option to group
     * 
     * @param ActionOption $option
     * @return ActionOptionGroup
     */
    public function addOption(ActionOption $option)
    {
        $this->options[] = $option;
        
        return $this;
    }
    
    /**
     * Getter for group options
     * 
     * @return ActionOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }
}