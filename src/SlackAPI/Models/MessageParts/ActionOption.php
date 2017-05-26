<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Exceptions\SlackException;

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
     */
    protected $text = null;
    
    /**
     * @var string
     * @Type("string")
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
    
    /**
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    public function validateModel()
    {
        if ($this->text === null) {
            throw new SlackException('text property cannot be null', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->value === null) {
            throw new SlackException('value property cannot be null', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if (strlen($this->value) > 2000) {
            throw new SlackException('value property must be 2000 characters or less', SlackException::STRING_TOO_LONG);
        }
    }
}