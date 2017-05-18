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
abstract class AbstractModel extends MagicGetter
{
    public function __construct()
    {
        // Add Required annotation to autoloader
        AnnotationRegistry::registerAutoloadNamespace(
            'Doctrine',
            'vendor/doctrine'
        );
        AnnotationRegistry::registerLoader('class_exists');
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
                    if ($object instanceof AbstractModel) {
                        $object->validateRequired();
                    }
                }
            } else {
                foreach ($annotationReader->getPropertyAnnotations($property) as $annotation) {
                    if ($annotation instanceof Required && $this->{$property->name} === null) {
                        throw new SlackException(get_class($this).' missing required field : '.$property->name, SlackException::MISSING_REQUIRED_FIELD);
                    }
                }
            }
        }
    }
}