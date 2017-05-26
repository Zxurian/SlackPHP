<?php

namespace SlackPHP\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class for confirm action buttons
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
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
    protected $okText = null;
    
    /**
     * @var string
     * @Type("string")
     */
    protected $dismissText = null;

    /**
     * Setter for title
     * 
     * @param string $title
     * @throws \InvalidArgumentException
     * @return ActionConfirm
     */
    public function setTitle($title)
    {
        if (!is_scalar($title)) {
            throw new \InvalidArgumentException('Title should be scalar type');
        }
        
        $this->title = (string)$title;
        
        return $this;
    }

    /**
     * Setter for text
     * 
     * @param string $text
     * @throws \InvalidArgumentException
     * @return ActionConfirm
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
     * Setter for okText
     *
     * @param string $okText
     * @throws \InvalidArgumentException
     * @return ActionConfirm
     */
    public function setOkText($okText)
    {
        if (!is_scalar($okText)) {
            throw new \InvalidArgumentException('Ok text should be scalar type');
        }
        
        $this->okText = (string)$okText;
    
        return $this;
    }
    
    /**
     * Setter for dismissText
     *
     * @param string $dismissText
     * @throws \InvalidArgumentException
     * @return ActionConfirm
     */
    public function setDismissText($dismissText)
    {
        if (!is_scalar($dismissText)) {
            throw new \InvalidArgumentException('Dismiss text should be scalar type');
        }
        
        $this->dismissText = (string)$dismissText;
    
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    protected function validateModel()
    {
        if ($this->text === null) {
            throw new SlackException('text property cannot be null', SlackException::MISSING_REQUIRED_FIELD);
        }
    }

}