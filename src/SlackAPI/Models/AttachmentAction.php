<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractModel;
use Doctrine\Common\Annotations\Annotation\Required;

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
class AttachmentAction extends AbstractModel
{
    /**
     * @var string
     * @Required
     */
    protected $name = null;

    /**
     * @var string
     * @Required
     */
    protected $text = null;

    /**
     * @var string
     */
    protected $style = null;

    /**
     * @var string
     * @Required
     */
    protected $type = null;
    
    /**
     * @var string
     */
    protected $value = null;
    
    /**
     * @var ActionConfirm
     */
    protected $confirm = null;
    
    /**
     * @var ActionOption[]
     */
    protected $options = [];
    
    /**
     * @var ActionOption[]
     */
    protected $selectedOptions = [];
    
    /**
     * @var ActionOptionGroup[]
     */
    protected $optionGroups = [];
    
    /**
     * @var string
     */
    protected $dataSource = null;
    
    /**
     * @var int
     */
    protected $minQueryLength = null;
    
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
        
        $this->style = (string)$style;
    
        return $this;
    }
    
    /**
     * Setter for type
     *
     * @param string $type
     * @throws SlackException
     * @return AttachmentAction
     */
    public function setType($type)
    {
        if (!is_scalar($type)) {
            throw new SlackException('Type should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->type = (string)$type;
    
        return $this;
    }
    
    /**
     * Setter for value
     *
     * @param string $value
     * @throws SlackException
     * @return AttachmentAction
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
     * Setter for confirm
     *
     * @param ActionConfirm $confirm
     * @return AttachmentAction
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
     * @throws SlackException
     * @return AttachmentAction
     */
    public function setMinQueryLength($minQueryLength)
    {
        if (!is_int($minQueryLength)) {
            throw new SlackException('MinQueryLength should be integer type', SlackException::NOT_INT);
        }
        
        $this->minQueryLength = $minQueryLength;
    
        return $this;
    }
}