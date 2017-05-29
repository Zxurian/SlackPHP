<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class to create new option for action
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
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
     * @var string|null
     * @Type("string")
     */
    protected $text = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $value = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $description = null;
    
    /**
     * A short, user-facing string to label this option to users.
     * Use a maximum of 30 characters or so for best results across, you
     * guessed it, form factors.
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return ActionOption
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
     * A short string that identifies this particular option to your application.
     * It will be sent to your Action URL when this option is selected. While
     * there's no limit to the value of your Slack app, this value may contain
     * up to only 2000 characters.
     * 
     * @param string $value
     * @throws \InvalidArgumentException
     * @return ActionOption
     */
    public function setValue($value)
    {
        if (!is_scalar($value)) {
            throw new \InvalidArgumentException('Value should be scalar');
        }
        
        if (strlen($value) > 2000) {
            throw new SlackException('Value cannot contain more than 2000 characters', SlackException::STRING_TOO_LONG);
        }
        
        $this->value = (string)$value;
        
        return $this;
    }
    
    /**
     * A user-facing string that provides more details about this option.
     * Also should contain up to 30 characters.
     *
     * @param string $description
     * @throws \InvalidArgumentException
     * @return ActionOption
     */
    public function setDescription($description)
    {
        if (!is_scalar($description)) {
            throw new \InvalidArgumentException('Description should be scalar');
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
    }
}