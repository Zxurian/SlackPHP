<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class to create new action for attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class AttachmentAction
{
    /**
     * @var string|NULL
     */
    private $name = null;

    /**
     * @var string|NULL
     */
    private $text = null;

    /**
     * @var string|NULL
     */
    private $style = null;

    /**
     * @var string|NULL
     */
    private $type = null;
    
    /**
     * @var string|NULL
     */
    private $value = null;
    
    /**
     * @var ActionConfirm|NULL
     */
    private $confirm = null;
    
    /**
     * @var ActionOption[]
     */
    private $options = [];
    
    /**
     * @var ActionOption[]
     */
    private $selectedOptions = [];
    
    /**
     * @var ActionOptionGroup[]
     */
    private $optionGroups = [];
    
    /**
     * @var string|NULL
     */
    private $dataSource = null;
    
    /**
     * @var int|NULL
     */
    private $minQueryLength = null;
    
    /**
     * Setter for name
     * 
     * @param string $name
     * @throws SlackException
     * @return AttachmentAction
     */
    public function setName($name)
    {
        if (!is_scalar($name)) {
            throw new SlackException('Name should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->name = (string)$name;
        
        return $this;
    }

    /**
     * Getter for name
     * 
     * @return string|NULL
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter for text
     * 
     * @param string $text
     * @throws SlackException
     * @return AttachmentAction
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
     * Setter for style
     *
     * @param string $style
     * @throws SlackException
     * @return AttachmentAction
     */
    public function setStyle($style)
    {
        if (!is_scalar($style)) {
            throw new SlackException('Style should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->style = $style;
    
        return $this;
    }
    
    /**
     * Getter for style
     *
     * @return string|NULL
     */
    public function getStyle()
    {
        return $this->style;
    }
    
    /**
     * Setter for type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }
    
    /**
     * Getter for type
     *
     * @return string|NULL
     */
    public function getType()
    {
        return $this->type;
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
     * Setter for confirm
     *
     * @param string $text
     */
    public function setConfirm(ActionConfirm $confirm)
    {
        $this->confirm = $confirm;
    
        return $this;
    }
    
    /**
     * Getter for confirm
     *
     * @return ActionConfirm|NULL
     */
    public function getConfirm()
    {
        return $this->confirm;
    }
    
    /**
     * Add new ActionOption to Array
     * 
     * @param ActionOption $option
     * @return AttachmentAction
     */
    public function addOption(ActionOption $option)
    {
        $this->options[] = $option;
        
        return $this;
    }
    
    /**
     * Getter for Options
     * 
     * @return ActionOption[]
     */
    public function getOptions()
    {
        return $this->getOptions();
    }
    
    /**
     * Add new Selected Option to Array
     *
     * @param ActionOption $selectedOption
     * @return AttachmentAction
     */
    public function addSelectedOption(ActionOption $selectedOption)
    {
        $this->selectedOptions[] = $selectedOption;
    
        return $this;
    }
    
    /**
     * Getter for selectedOptions
     *
     * @return ActionOption[]
     */
    public function getSelectedOptions()
    {
        return $this->selectedOptions();
    }
    
    /**
     * Add new Options group to Array
     *
     * @param ActionOptionGroup $optionGroups
     * @return AttachmentAction
     */
    public function addOptionGroup(ActionOptionGroup $optionGroup)
    {
        $this->optionGroups[] = $optionGroup;
    
        return $this;
    }
    
    /**
     * Getter for option groups
     *
     * @return ActionOptionGroup[]
     */
    public function getOptionGroups()
    {
        return $this->optionGroups();
    }
    
    /**
     * Setter for minQueryLength
     *
     * @param int $minQueryLength
     */
    public function setMinQueryLength($minQueryLength)
    {
        $this->minQueryLength = $minQueryLength;
    
        return $this;
    }
    
    /**
     * Getter for minQueryLength
     *
     * @return int|NULL
     */
    public function getMinQueryLength()
    {
        return $this->minQueryLength;
    }
}