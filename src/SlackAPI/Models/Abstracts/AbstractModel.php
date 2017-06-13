<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackPHP\SlackAPI\Models\Abstracts\ValidateInterface;
use SlackPHP\SlackAPI\Enumerators\DateToken;
use SlackPHP\SlackAPI\Exceptions\SlackException;
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
     * @param scalar $link The link
     * @param scalar $display (optional) The text to display
     */
    public function getLink($link, $display = null)
    {
        if (!is_scalar($link)) {
            throw new \InvalidArgumentException('Link must be scalar');
        }
        if (!is_null($display) && !is_scalar($display)) {
            throw new \InvalidArgumentException('Display must be scalar');
        }
        
        return self::LEFT_ANGLE_PLACEHOLDER.$link.(!is_null($display) ? '|'.$display : '').self::RIGHT_ANGLE_PLACEHOLDER;
    }
    
    /**
     * Create formatted date for Slack text fields. Include at least one DateToken enum value in 
     * stringContainingDateTokens parameter to show formatted date.
     * 
     * @param int $timestamp Unix format timestamp
     * @param string $fallback Message in case the client is unable to process the date
     * @param string $stringContainingDateTokens Describe your date and time format as a string
     * @param string $link URL in case your date needs to be linked
     * @return string
     */
    public function getFormatedDate($timestamp, $fallback, $stringContainingDateTokens = '', $link = null)
    {   
        if (!is_int($timestamp)) {
            throw new \InvalidArgumentException('Timestamp must be an integer');
        }
        if (!is_scalar($fallback)) {
            throw new \InvalidArgumentException('Fallback must be a scalar');
        }
        if (!is_scalar($stringContainingDateTokens)) {
            throw new \InvalidArgumentException('A stringContainingDateTokens parameter must be a scalar');
        }
        if (!is_null($link) && !is_scalar($link)) {
            throw new \InvalidArgumentException('Link must be a scalar');
        }
        
        return self::LEFT_ANGLE_PLACEHOLDER.'!date^'.$timestamp.
            '^'.$stringContainingDateTokens.
            (!is_null($link) ? '^'.$link : '').
            '|'.$fallback.self::RIGHT_ANGLE_PLACEHOLDER
        ;
    }
    /**
     * Create special command for use in Slack text fields
     * Provide label to create @here or @subteam commands
     * Subteam special command requires id
     * 
     * @param SpecialCommand $specialCommand Special command from SpecialCommand enum
     * @param string $label Label to be used with variable
     * @param string $id Subteam id for special command
     * @throws \InvalidArgumentException
     * @throws SlackException
     * @return string
     */
    public function getVariable(SpecialCommand $specialCommand, $label = null, $id = null)
    {
        if (!is_scalar($label) && !is_null($label)) {
            throw new \InvalidArgumentException('label must be a scalar');
        }
        if (!is_scalar($id) && !is_null($id)) {
            throw new \InvalidArgumentException('id must be a scalar');
        }
        $command = $specialCommand->getValue();
        
        if ($specialCommand == SpecialCommand::HERE() || $specialCommand == SpecialCommand::SUBTEAM()) {
            $id = '';
            if (is_null($label)) {
                throw new SlackException('Label required for '.$specialCommand->getValue(), SlackException::LABEL_REQUIRED);
            }
            if($specialCommand == SpecialCommand::SUBTEAM()) {
                if (is_null($id)) {
                    throw new SlackException($specialCommand->getValue().' requires id to be provided', SlackException::ID_REQUIRED);
                }
                $id = '^'.$id;
            }
            $command = $command.$id.'|'.$label;
        }
        return self::LEFT_ANGLE_PLACEHOLDER.'!'.$command.self::RIGHT_ANGLE_PLACEHOLDER;
    }
}