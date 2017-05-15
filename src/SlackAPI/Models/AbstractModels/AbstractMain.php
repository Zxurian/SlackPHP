<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\Annotation\Required;

/**
 * Abstract class for Models
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.1
 */
abstract class AbstractMain
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
     * Validate the model by checking for all required fields.
     * This is easily mapped by adding the @Required annotation to the property of the model, or if
     * more complicated validations need to be done, this should be overridden within the model itself
     *
     * @return void
     */
    public function validateRequired()
    {
        $annotationReader = new AnnotationReader();
        $refClass = new \ReflectionClass($this);
        foreach ($refClass->getProperties() as $property) {
            if (is_array($this->{$property->name})) {
                foreach ($this->{$property->name} as $object) {
                    if ($object instanceof AbstractMain) {
                        $object->validateRequired();
                    }
                }
            } else {
                $annotations = $annotationReader->getPropertyAnnotations($property);
                foreach ($annotationReader->getPropertyAnnotations($property) as $annotation) {
                    if ($annotation instanceof Required && $this->{$property->name} === null) {
                        throw new SlackException(get_class($this).' missing required field : '.$property->name);
                    }
                }
            }
        }
    }
}