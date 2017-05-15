<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractMain;

/**
 * Class to create new option group in action
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/docs/interactive-message-field-guide#option_groups_to_place_within_message_menu_actions
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getText()
 * @method ActionOption[] getOptions()
 */
class ActionOptionGroup extends AbstractMain
{
    /**
     * @var string|NULL
     * @Required
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
        if (!is_scalar($text)) {
            throw new SlackException('Text should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->text = $text;
        
        return $this;
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
}