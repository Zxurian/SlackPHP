<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Enumerators\ActionType;
use SlackPHP\SlackAPI\Enumerators\ActionDataSource;
use SlackPHP\SlackAPI\Enumerators\ActionStyle;
use JMS\Serializer\Annotation\Accessor;

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
 * @method ActionStyle getStyle()
 * @method ActionType getType()
 * @method ActionOption[] getOptions()
 * @method bool getValue()
 * @method ActionConfirm getConfirm()
 * @method ActionOption[] getSelectedOptions()
 * @method ActionOptionGroup[] getOptionGroups()
 * @method ActionDataSource getDataSource()
 * @method int getMinQueryLength()
 */
class AttachmentAction extends AbstractModel
{
    /**
     * @var string
     * @Type("string")
     */
    protected $name = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $text = null;

    /**
     * @var ActionStyle
     * @Accessor(getter="getValue")
     */
    protected $style = null;

    /**
     * @var ActionType
     * @Type("string")
     */
    protected $type = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $value = null;
    
    /**
     * @var ActionConfirm
     * @Type("SlackPHP\SlackAPI\Models\MessageParts\ActionConfirm")
     */
    protected $confirm = null;
    
    /**
     * @var ActionOption[]
     * @Type("array<SlackPHP\SlackAPI\Models\MessageParts\ActionOption>")
     */
    protected $options = [];
    
    /**
     * @var ActionOption[]
     * @Type("array<SlackPHP\SlackAPI\Models\MessageParts\ActionOption>")
     */
    protected $selectedOptions = [];
    
    /**
     * @var ActionOptionGroup[]
     * @Type("array<SlackPHP\SlackAPI\Models\MessageParts\ActionOptionGroup>")
     */
    protected $optionGroups = [];
    
    /**
     * @var ActionDataSource
     * @Type("string")
     */
    protected $dataSource = null;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $minQueryLength = 1;
    
    public function __construct()
    {
        $this->style = ActionStyle::defaultStyle();
        $this->dataSource = ActionDataSource::staticSource();
    }
    
    /**
     * Setter for name
     * 
     * @param string $name
     * @throws \InvalidArgumentException
     * @return AttachmentAction
     */
    public function setName($name)
    {
        if (!is_scalar($name)) {
            throw new \InvalidArgumentException('Name should be scalar type');
        }
        
        $this->name = (string)$name;
        
        return $this;
    }

    /**
     * Setter for text
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return AttachmentAction
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new \InvalidArgumentException('Text should be scalar type');
        }
        
        $this->text = (string)$text;
        
        return $this;
    }
    
    /**
     * Setter for style
     *
     * @param Style $style
     * @return AttachmentAction
     */
    public function setStyle(ActionStyle $style)
    {
        $this->style = $style->getValue();
    
        return $this;
    }
    
    /**
     * Setter for type
     *
     * @param \SlackPHP\SlackAPI\Enumerators\Type $type
     * @return AttachmentAction
     */
    public function setType(ActionType $type)
    {
        $this->type = $type->getValue();
    
        return $this;
    }
    
    /**
     * Setter for value
     *
     * @param string $value
     * @throws \InvalidArgumentException
     * @return AttachmentAction
     */
    public function setValue($value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException('Value should be scalar type');
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
     * Setter for dataSource
     *
     * @param DataSource $dataSourse
     * @return AttachmentAction
     */
    public function setDataSource(ActionDataSource $dataSource)
    {
        $this->dataSource = $dataSource->getValue();
    
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
            throw new \InvalidArgumentException('MinQueryLength should be integer type');
        }
        
        $this->minQueryLength = $minQueryLength;
    
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    public function validateModel()
    {
        if ($this->name === null) {
            throw new SlackException('name property is required in AttachmentAction', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->text === null) {
            throw new SlackException('text property is required in AttachmentAction', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->type === null) {
            throw new SlackException('type property is required in AttachmentAction', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if (strlen($this->value) > 2000) {
            throw new SlackException('value cannot be greater than 2000 characters', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if (count($this->options) > 100) {
            throw new SlackException('cannot provide more than 100 options', SlackException::TOO_MANY_OPTIONS);
        }
        
        if (count($this->selectedOptions) > 1) {
            throw new SlackException('cannot provide more than 1 option to selectedOption', SlackException::TOO_MANY_OPTIONS);
        }
        
        switch ($this->dataSource->getValue()) {
            case ActionDataSource::staticSource:
                if (count($this->options) < 1) {
                    throw new SlackException('must provide ActionOptions when using static data source', SlackException::MISSING_REQUIRED_FIELD);
                }
                
                if (count($this->selectedOptions) > 0) {
                    $foundMatch = false;
                    foreach ($this->options as $option) {
                        if ($option->getValue() === $this->selectedOptions[0]->getValue()) {
                            $foundMatch = true;
                        }
                    }
                    if (!$foundMatch) {
                        throw new SlackException('selectedOption value must be in list of provided options');
                    }
                }
                break;
        }
        
    }
}