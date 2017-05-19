<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractModel;
use Doctrine\Common\Annotations\Annotation\Required;
use JMS\Serializer\Annotation\Type;

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
     * @Type("string")
     * @Required
     */
    protected $text = null;
    
    /**
     * @var string
     * @Type("string")
     * @Required
     */
    protected $value = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $description = null;
    
    /**
     * Setter for text
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return ActionOption
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
     * Setter for value
     * 
     * @param string $value
     * @throws \InvalidArgumentException
     * @return ActionOption
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
     * Setter for description
     *
     * @param string $description
     * @throws \InvalidArgumentException
     * @return ActionOption
     */
    public function setDescription($description)
    {
        if (!is_scalar($description)) {
            throw new \InvalidArgumentException('Description should be scalar type');
        }
        
        $this->description = (string)$description;
    
        return $this;
    }
}