<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use SlackPHP\SlackAPI\Interfaces\PayloadInterface;

/**
 * Generates name of response payload classes 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
abstract class AbstractPayload implements PayloadInterface
{
    /**
     * Get the name of the response class that will hold the returning information
     * 
     * @return string
     */
    public function getResponseClass()
    {
        return get_class($this).'Response';
    }
    
    /**
     * Get the name of the Slack method for the payload
     * 
     * @return string
     */
    public function getMethod()
    {
        return static::method;
    }
    
    /**
     * Magic Method for getting properties
     * 
     * @param string $methodName
     */
    public function __call($methodName)
    {
        if (substr($methodName, 0, 3) == 'get') {
            $propertyName = strtolower($methodName, 3, 1).substr($methodName, 4);
            if (!property_exists($this, $propertyName)) {
                throw new \ErrorException('Undefined property: '.get_class($this).'::$'.$propertyName);
            }
            return $this->{$propertyName};
        }
        
        $this->$methodName();
    }
}