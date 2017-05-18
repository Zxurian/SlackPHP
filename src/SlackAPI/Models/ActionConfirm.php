<?php

namespace SlackPHP\SlackAPI\Models;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractModel;
use Doctrine\Common\Annotations\Annotation\Required;

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
     */
    protected $title = null;

    /**
     * @var string
     * @Required
     */
    protected $text = null;

    /**
     * @var string
     */
    protected $okText = null;
    
    /**
     * @var string
     */
    protected $dismissText = null;

    /**
     * Setter for title
     * 
     * @param string $title
     * @throws SlackException
     * @return ActionConfirm
     */
    public function setTitle($title)
    {
        if (!is_scalar($title)) {
            throw new SlackException('Title should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->title = (string)$title;
        
        return $this;
    }

    /**
     * Setter for text
     * 
     * @param string $text
     * @throws SlackException
     * @return ActionConfirm
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
     * Setter for okText
     *
     * @param string $okText
     * @throws SlackException
     * @return ActionConfirm
     */
    public function setOkText($okText)
    {
        if (!is_scalar($okText)) {
            throw new SlackException('Ok text should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->okText = (string)$okText;
    
        return $this;
    }
    
    /**
     * Setter for dismissText
     *
     * @param string $dismissText
     * @throws SlackException
     * @return ActionConfirm
     */
    public function setDismissText($dismissText)
    {
        if (!is_scalar($dismissText)) {
            throw new SlackException('Dismiss text should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->dismissText = (string)$dismissText;
    
        return $this;
    }
}