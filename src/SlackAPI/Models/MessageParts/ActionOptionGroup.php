<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use JMS\Serializer\Annotation\Type;

/**
 * Class to create new option group in action
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/docs/interactive-message-field-guide#option_groups_to_place_within_message_menu_actions
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getText()
 * @method ActionOption[] getOptions()
 */
class ActionOptionGroup extends AbstractModel
{
    /**
     * @var string|null
     * @Type("string")
     */
    protected $text = null;
    
    /**
     * @var ActionOption[]
     * @Type("array<SlackPHP\SlackAPI\Models\MessageParts\ActionOption>")
     */
    protected $options = [];
    
    /**
     * A short, user-facing string to label this option to users
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return ActionOptionGroup
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
     * The individual options to appear in this message menu, provided as an array of option fields.
     * Required when data_source is default or otherwise unspecified.
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
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    public function validateModel()
    {
        if ($this->text === null) {
            throw new SlackException('text property cannot be null', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if (count($this->options) < 1) {
            throw new SlackException('options value must contain at least one option', SlackException::NOT_ENOUGH_OPTIONS);
        }
    }
}