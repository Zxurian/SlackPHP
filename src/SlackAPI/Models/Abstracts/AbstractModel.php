<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackPHP\SlackAPI\Models\Abstracts\ValidateInterface;

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
}