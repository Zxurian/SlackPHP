<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractMain;

/**
 * Class to create new action for attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/docs/interactive-message-field-guide#action_fields
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getName()
 * @method string getText()
 * @method string getStyle()
 * @method bool getType()
 * @method ActionOption[] getOptions()
 * @method bool getValue()
 * @method ActionConfirm getConfirm()
 * @method ActionOption[] getSelectedOptions()
 * @method ActionOptionGroup[] getOptionGroups()
 * @method string getDataSource()
 * @method int getMinQueryLength()
 */
class AttachmentAction extends AbstractMain
{
    /**
     * @var string|NULL
     * @Required
     */
    private $name = null;

    /**
     * @var string|NULL
     * @Required
     */
    private $text = null;

    /**
     * @var string|NULL
     */
    private $style = null;

    /**
     * @var string|NULL
     * @Required
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
     * Setter for minQueryLength
     *
     * @param int $minQueryLength
     */
    public function setMinQueryLength($minQueryLength)
    {
        $this->minQueryLength = $minQueryLength;
    
        return $this;
    }
}