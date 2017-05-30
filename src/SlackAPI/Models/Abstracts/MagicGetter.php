<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

/**
 * Abstract class for magic properties getter
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.2
 */
abstract class MagicGetter
{
    /**
     * Magic Method for getting properties
     *
     * @param string $methodName
     * @param array $arguments
     * @throws \ErrorException
     * @return mixed
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
    
        trigger_error('Fatal error: Call to undefined method '. get_class($this) .'::'. $methodName .'()', E_USER_ERROR);
    }
}