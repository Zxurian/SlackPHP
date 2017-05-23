<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use Doctrine\Common\Annotations\Annotation\Required;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Enumerators\Style;
use SlackPHP\SlackAPI\Enumerators\DataSourse;

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
     * @Type("string")
     * @Required
     */
    protected $name = null;

    /**
     * @var string
     * @Type("string")
     * @Required
     */
    protected $text = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $style = null;

    /**
     * @var string
     * @Type("string")
     * @Required
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
     * @var string
     * @Type("string")
     */
    protected $dataSource = null;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $minQueryLength = null;
    
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
    public function setStyle(Style $style)
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
    public function setType(\SlackPHP\SlackAPI\Enumerators\Type $type)
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
     * Setter for dataSourse
     *
     * @param DataSourse $dataSourse
     * @return AttachmentAction
     */
    public function setDataSourse(DataSourse $dataSourse)
    {
        $this->dataSourse = $dataSourse->getValue();
    
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
}