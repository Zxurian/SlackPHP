<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackAPI\Models\Abstracts\ValidateInterface;

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
    /**
     * Validate the model and all children to see if all requirements are met
     * 
     * @param AbstractModel @model
     */
    public function validateRequired(AbstractModel $model)
    {
        foreach(get_object_vars($model) as $property => $value) {
            if (is_object($value)) {
                $value->validateRequired($value);
            }
        }
        
        if (method_exists($this, 'validateModel')) {
            $this->validateModel();
        }
    }
}