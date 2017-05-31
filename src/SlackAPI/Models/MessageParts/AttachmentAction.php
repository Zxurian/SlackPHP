<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Enumerators\ActionType;
use SlackPHP\SlackAPI\Enumerators\ActionDataSource;
use SlackPHP\SlackAPI\Enumerators\ActionStyle;

/**
 * Class to create new action for attachment
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
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
     * @var string|null
     * @Type("string")
     */
    protected $name = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $text = null;

    /**
     * @var ActionStyle
     * @Type("MyCLabsEnum<SlackPHP\SlackAPI\Enumerators\ActionStyle>")
     */
    protected $style = null;

    /**
     * @var ActionType|null
     * @Type("MyCLabsEnum<SlackPHP\SlackAPI\Enumerators\ActionType>")
     */
    protected $type = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $value = null;
    
    /**
     * @var ActionConfirm|null
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
     * @Type("MyCLabsEnum<SlackPHP\SlackAPI\Enumerators\ActionDataSource>")
     */
    protected $dataSource = null;
    
    /**
     * @var int
     * @Type("integer")
     */
    protected $minQueryLength = 1;
    
    public function __construct()
    {
        $this->style = ActionStyle::DEFAULT_STYLE();
        $this->dataSource = ActionDataSource::STATIC_SOURCE();
    }
    
    /**
     * Provide a string to give this specific action a name.
     * The name will be returned to your Action URL along with the message's
     * callback_id when this action is invoked. Use it to identify this
     * particular response path. If multiple actions share the same name, only
     * one of them can be in a triggered state.
     * 
     * @param string $name
     * @throws \InvalidArgumentException
     * @return AttachmentAction
     */
    public function setName($name)
    {
        if (!is_scalar($name)) {
            throw new \InvalidArgumentException('Name should be scalar');
        }
        
        $this->name = (string)$name;
        
        return $this;
    }

    /**
     * The user-facing label for the message button or menu representing this action.
     * Cannot contain markup. Best to keep these short and decisive. Use a
     * maximum of 30 characters or so for best results across form factors.
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return AttachmentAction
     */
    public function setText($text)
    {
        if (!is_scalar($text)) {
            throw new \InvalidArgumentException('Text should be scalar');
        }
        
        $this->text = (string)$text;
        
        return $this;
    }
    
    /**
     * Provide button when this action is a message button or provide select when the action is a message menu.
     *
     * @param ActionType $type
     * @return AttachmentAction
     */
    public function setType(ActionType $type)
    {
        $this->type = $type;
    
        return $this;
    }
    
    /**
     * Provide a string identifying this specific action.
     * It will be sent to your Action URL along with the name and attachment's
     * callback_id. If providing multiple actions with the same name, value
     * can be strategically used to differentiate intent. Your value may
     * contain up to 2000 characters.
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
        
        if (strlen($value) > 2000) {
            throw new SlackException('Value cannot contain more than 2000 characters', SlackException::STRING_TOO_LONG);
        }
        
        $this->value = (string)$value;
    
        return $this;
    }
    
    /**
     * Set the confirmation hash
     * If you provide a hash of confirmation fields, your button or menu will
     * pop up a dialog with your indicated text and choices, giving them one
     * last chance to avoid a destructive action or other undesired outcome.
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
     * Used only with message buttons.
     * This decorates buttons with extra visual importance, which is
     * especially useful when providing logical default action or
     * highlighting a destructive activity.
     *
     * @param ActionStyle $style
     * @return AttachmentAction
     */
    public function setStyle(ActionStyle $style)
    {
        $this->style = $style;
        
        return $this;
    }
    
    /**
     * Used only with message menus.
     * The individual options to appear in this menu, provided as an array of
     * option fields. Required when data_source is static or otherwise
     * unspecified. A maximum of 100 options can be provided in each menu.
     * 
     * @param ActionOption $option
     * @return AttachmentAction
     */
    public function addOption(ActionOption $option)
    {
        if (count($this->options) >= 100) {
            throw new SlackException('Cannot add more than 100 options', SlackException::TOO_MANY_OPTIONS);
        }
        
        $this->options[] = $option;
        
        return $this;
    }
    
    /**
     * If provided, the first element of this array will be set as the pre-selected option for this menu. 
     *
     * @param ActionOption $selectedOption
     * @return AttachmentAction
     */
    public function addSelectedOption(ActionOption $selectedOption)
    {
        if (count($this->selectedOptions) >= 1) {
            throw new SlackException('Cannot provide more than 1 option to selectedOption', SlackException::TOO_MANY_OPTIONS);
        }
        
        $this->selectedOptions[] = $selectedOption;
    
        return $this;
    }
    
    /**
     * Used only with message menus.
     * An alternate, semi-hierarchal way to list available options. Provide an
     * array of option group definitions. This replaces and supersedes the
     * options array.
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
     * Sets the Data Source
     * Our clever default behavior is default, which means the menu's options
     * are provided directly in the posted message under options. Defaults to
     * static. Example: "channels"
     *
     * @param ActionDataSource $dataSourse
     * @return AttachmentAction
     */
    public function setDataSource(ActionDataSource $dataSource)
    {
        $this->dataSource = $dataSource;
    
        return $this;
    }
    
    /**
     * Only applies when data_source is set to external.
     * If present, Slack will wait till the specified number of characters are
     * entered before sending a request to your app's external suggestions API
     * endpoint. Defaults to 1.
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
        
        switch ($this->dataSource->getValue()) {
            case ActionDataSource::STATIC_SOURCE:
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
                        throw new SlackException('selectedOption value must be in list of provided options', SlackException::SELECTED_OPTION_NOT_FOUND_IN_OPTIONS);
                    }
                }
                break;
        }
        
    }
}