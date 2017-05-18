<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractModel;
use Doctrine\Common\Annotations\Annotation\Required;

/**
 * Class to create new option for action
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/docs/interactive-message-field-guide#option_fields_to_place_within_message_menu_actions
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getDescription()
 * @method string getText()
 * @method string getValue()
 */
class ActionOption extends AbstractModel
{
    /**
     * @var string
     * @Required
     */
    protected $text = null;
    
    /**
     * @var string
     * @Required
     */
    protected $value = null;
    
    /**
     * @var string
     */
    protected $description = null;
    
    /**
     * Setter for text
     * 
     * @param string $text
     * @throws SlackException
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
     * Setter for value
     * 
     * @param string $value
     * @throws SlackException
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
     * Setter for description
     *
     * @param string $description
     * @throws SlackException
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
}