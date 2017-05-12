<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use SlackPHP\SlackAPI\Interfaces\PayloadInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Abstract method for individual Slack Payloads 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.2
 */
abstract class AbstractPayload implements PayloadInterface
{
    public function __construct()
    {
    }
    
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
    public function __call($methodName, $arguments)
    {
        if (substr($methodName, 0, 3) == 'get') {
            $propertyName = strtolower(substr($methodName, 3, 1)).substr($methodName, 4);
            if (!property_exists($this, $propertyName)) {
                throw new \ErrorException('Undefined property: '.get_class($this).'::$'.$propertyName);
            }
            return $this->{$propertyName};
        }
        
        $this->$methodName();
    }
    
    /**
     * Check to see if the payload has all of the required properties
     * 
     * @return bool
     */
    public function hasRequired()
    {
        AnnotationRegistry::registerAutoloadNamespace(
            'Doctrine\\Common\\Annotations',
            'vendor/doctrine/annotations/lib/Doctrine/Common/Annotations'
        );
        
        $annotationReader = new AnnotationReader();
        $refClass = new \ReflectionClass($this);
        foreach ($refClass->getProperties() as $property) {
            $annotations = $annotationReader->getPropertyAnnotations($property);
            var_dump($annotations);
        }
    }
}