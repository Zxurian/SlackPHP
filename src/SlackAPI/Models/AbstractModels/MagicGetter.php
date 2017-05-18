<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Abstract class for magic properties getter
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.1
 */
abstract class MagicGetter
{
    /**
     * Magic Method for getting properties
     *
     * @param string $methodName
     */
    public function __call($methodName, $arguments)
    {
        if (substr($methodName, 0, 3) == 'get') {
            $propertyName = strtolower(substr($methodName, 3, 1)).substr($methodName, 4);
            if (!property_exists($this, $propertyName)) {
                throw new \ErrorException('Undefined property: '.get_class($this).'::$'.$propertyName);
            }
            return $this->{$propertyName};
        }
    
        throw new \Exception('Call to undefined method '. get_class($this) .'::'. $methodName .'()');
    }
}