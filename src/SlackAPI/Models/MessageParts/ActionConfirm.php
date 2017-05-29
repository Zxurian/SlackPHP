<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class for confirm action buttons
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/docs/interactive-message-field-guide#confirmation_fields
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getTitle()
 * @method string getText()
 * @method string getOkText()
 * @method string getDismissText()
 */
class ActionConfirm extends AbstractModel
{
    /**
     * @var string
     * @Type("string")
     */
    protected $title = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $text = null;

    /**
     * @var string
     * @Type("string")
     */
    protected $okText = 'Okay';
    
    /**
     * @var string
     * @Type("string")
     */
    protected $dismissText = 'Cancel';

    /**
     * Title the pop up window. Please be brief.
     * 
     * @param string $title
     * @throws \InvalidArgumentException
     * @return ActionConfirm
     */
    public function setTitle($title)
    {
        if (!is_scalar($title)) {
            throw new \InvalidArgumentException('Title should be scalar');
        }
        
        $this->title = (string)$title;
        
        return $this;
    }

    /**
     * Describe in detail the consequences of the action and contextualize your button text choices.
     * Use a maximum of 30 characters or so for best results across form factors.
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return ActionConfirm
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
     * The text label for the button to continue with an action.
     * Keep it short. Defaults to Okay.
     *
     * @param string $okText
     * @throws \InvalidArgumentException
     * @return ActionConfirm
     */
    public function setOkText($okText)
    {
        if (!is_scalar($okText)) {
            throw new \InvalidArgumentException('Ok text should be scalar');
        }
        
        $this->okText = (string)$okText;
    
        return $this;
    }
    
    /**
     * The text label for the button to cancel the action.
     * Keep it short. Defaults to Cancel.
     *
     * @param string $dismissText
     * @throws \InvalidArgumentException
     * @return ActionConfirm
     */
    public function setDismissText($dismissText)
    {
        if (!is_scalar($dismissText)) {
            throw new \InvalidArgumentException('Dismiss text should be scalar');
        }
        
        $this->dismissText = (string)$dismissText;
    
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
    }

}