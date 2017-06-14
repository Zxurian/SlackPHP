<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackPHP\SlackAPI\Models\Abstracts\ValidateInterface;
use SlackPHP\SlackAPI\Enumerators\DateToken;
use SlackPHP\SlackAPI\Enumerators\SpecialCommand;

/**
 * Abstract class for Models
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.2
 */
abstract class AbstractModel extends MagicGetter implements ValidateInterface
{
    const LEFT_ANGLE_PLACEHOLDER = '|||LEFT_ANGLE|||';
    const LEFT_ANGLE_ACTUAL = '<';
    const RIGHT_ANGLE_PLACEHOLDER = '|||RIGHT_ANGLE|||';
    const RIGHT_ANGLE_ACTUAL = '>';
    const AMPERSAND_PLACEHOLDER = '|||AMPERSAND|||';
    const AMPERSAND_ACTUAL = '&';
    
    /**
     * Validate the model and all children to see if all requirements are met
     * 
     * @param AbstractModel
     */
    public function validateRequired(AbstractModel $model)
    {
        foreach(get_object_vars($model) as $property => $value) {
            if ($value instanceof AbstractModel) {
                $value->validateRequired($value);
            }
        }
        
        if (method_exists($this, 'validateModel')) {
            $this->validateModel();
        }
    }
    
    /**
     * Get a formatted Slack link to either a URL, user, or channel
     * 
     * @see https://api.slack.com/docs/message-formatting#linking_to_urls
     * @param scalar $link The link
     * @param scalar $display (optional) The text to display
     * @throws \InvalidArgumentException
     * @return string
     */
    public function getLink($link, $display = null)
    {
        if (filter_var($link, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Link must be scalar');
        }
        if (!is_null($display) && !is_scalar($display)) {
            throw new \InvalidArgumentException('Display must be scalar');
        }
        
        return self::LEFT_ANGLE_PLACEHOLDER.$link.(!is_null($display) ? '|'.$display : '').self::RIGHT_ANGLE_PLACEHOLDER;
    }
    
    /**
     * Create formatted date for Slack text fields.
     * Provide a string containing SlackPHP\SlackAPI\Enumerators\DateToken
     * tokens as placeholders that will be parsed within Slack
     * 
     * @see https://api.slack.com/docs/message-formatting#linking_to_urls
     * @param \DateTime $timestamp Date to be used
     * @param string $stringContainingDateTokens string to be parsed
     * @param string $fallback Message in case the client is unable to process the date
     * @param string $link (optional) URL in case your date needs to be linked
     * @throws \InvalidArgumentException
     * @return string
     */
    public function getFormattedDate(\DateTime $date, $stringContainingDateTokens, $fallback, $link = null)
    {
        if (!is_scalar($stringContainingDateTokens)) {
            throw new \InvalidArgumentException('The string to parse must be scalar');
        }
        if (!is_scalar($fallback)) {
            throw new \InvalidArgumentException('Fallback text must be scalar');
        }
        if (!is_null($link) && !is_scalar($link)) {
            throw new \InvalidArgumentException('Link must be scalar');
        }
        
        return self::LEFT_ANGLE_PLACEHOLDER.'!date^'.$date->getTimestamp().
            '^'.$stringContainingDateTokens.
            (!is_null($link) ? '^'.$link : '').
            '|'.$fallback.self::RIGHT_ANGLE_PLACEHOLDER
        ;
    }
    
    /**
     * Create special command for use in Slack text fields
     * here command will default to a label of "here" if one isn’t provided
     * subteam command requires an id & handle
     * 
     * @param SpecialCommand $specialCommand SpecialCommand Enumerator
     * @param string $label (optional) Label
     * @param string $id (required if using SUBTEAM) Subteam ID
     * @param string $handle (required if using SUBTEAM) Subteam Handle
     * @throws \InvalidArgumentException
     * @return string
     */
    public function getVariable(SpecialCommand $specialCommand, $label = null, $id = null, $handle = null)
    {
        // Special handling for subteam command
        if ($specialCommand->equals(SpecialCommand::SUBTEAM())) {
            if (!is_scalar($id)) {
                throw new \InvalidArgumentException('id is required for subteam');
            }
            if (!is_scalar($handle)) {
                throw new \InvalidArgumentException('handle is required for subteam');
            }
            return self::LEFT_ANGLE_PLACEHOLDER.'!'.$specialCommand->getValue().'^'.$id.'|'.$handle.self::RIGHT_ANGLE_PLACEHOLDER;
        }
        
        if (!is_null($label) && !is_scalar($label)) {
            throw new \InvalidArgumentException('label must be scalar');
        }
        
        if ($specialCommand->equals(SpecialCommand::HERE()) && is_null($label))  {
            $label = SpecialCommand::HERE;
        }
        
        return self::LEFT_ANGLE_PLACEHOLDER.'!'.$specialCommand->getValue().(!is_null($label) ? '|'.$label : '').self::RIGHT_ANGLE_PLACEHOLDER;
    }
}