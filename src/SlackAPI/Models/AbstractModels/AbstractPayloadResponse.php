<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use JMS\Serializer\Annotation\Type;

/**
 * Privides ok and error properties for deserialization of received payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.1
 * 
 * @method bool getOk()
 * @method string getError()
 */
abstract class AbstractPayloadResponse
{
    /**
     * @var bool|NULL
     * @Type("boolean")
     */
    protected $ok = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $error = null;
    
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
    
        if (method_exists($this, $methodName)) {
            $this->{$methodName}(...$arguments);
        } else {
            throw new \ErrorException('Method '.$methodName.' doesn’t exist in '.get_class($this).' class');
        }
    }
}