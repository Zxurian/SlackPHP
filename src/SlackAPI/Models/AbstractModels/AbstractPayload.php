<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\Annotation\Required;

/**
 * Abstract method for individual Slack Payloads 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.2
 */
abstract class AbstractPayload
{
    public function __construct()
    {
        // Add Required annotation to autoloader
        AnnotationRegistry::registerAutoloadNamespace(
            'Doctrine\\Common\\Annotations',
            'vendor/doctrine/annotations/lib'
        );
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
        
        $this->{$methodName}(...$arguments);
    }
    
    /**
     * Validate the payload by checking for all required fields.
     * This is easily mapped by adding the @Required annotation to the property of the payload, or if
     * more complicated validations need to be done, this should be overridden within the payload itself
     * 
     * @return void
     */
    public function validateRequired()
    {
        $annotationReader = new AnnotationReader();
        $refClass = new \ReflectionClass($this);
        foreach ($refClass->getProperties() as $property) {
            $annotations = $annotationReader->getPropertyAnnotations($property);
            foreach ($annotationReader->getPropertyAnnotations($property) as $annotation) {
                if ($annotation instanceof Required && $this->{$property->name} === null) {
                    throw new SlackException(get_class($this).' missing required field : '.$property->name);
                }
            }
        }
    }
}