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
    const LINK_START = '|||LINK_START|||';
    const LINK_MIDDLE = '|||LINK_MIDDLE|||';
    const LINK_END = '|||LINK_END|||';
    
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
        if (!is_scalar($display)) {
            throw new \InvalidArgumentException('Display must be scalar');
        }
        
        return self::LINK_START.$link.(!is_null($display) ? self::LINK_MIDDLE.$display : '').self::LINK_END;
    }
}