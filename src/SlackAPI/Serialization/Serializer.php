<?php

namespace SlackPHP\SlackAPI\Serialization;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use SecurityLib\Enum;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\VisitorInterface;
use Doctrine\Common\Annotations\AnnotationRegistry;

class Serializer
{
    /** @var \JMS\Serializer\Serializer */
    private static $serializer = null;
    
    private function __construct(){}
    
    private function __clone(){}
    
    private function __wakeup(){}
    
    /**
     * Get the Serializer Singleton
     * 
     * @return \JMS\Serializer\Serializer
     */
    private static function getSerializer()
    {
        if (static::$serializer === null) {
            AnnotationRegistry::registerAutoloadNamespace(
                'JMS\\Serializer\\Annotation',
                'vendor/jms/serializer/src'
            );
            
            static::$serializer = SerializerBuilder::create()
                ->configureListeners(function(EventDispatcher $dispatcher) {
                    $dispatcher->addListener(Events::PRE_SERIALIZE,
                        function(PreSerializeEvent $event) {
                            if ($event->getObject() instanceof Enum) {
                                $event->setType('MyCLabsEnum');
                            }
                        }
                        );
                })
                ->configureHandlers(function(HandlerRegistry $registry) {
                    $registry->registerHandler('serialization', 'MyCLabsEnum', 'array',
                        function(VisitorInterface $visitor, Enum $object, array $type) {
                            return $object->getValue();
                        }
                        );
                })
                ->build()
            ;
        }
        
        return static::$serializer;
    }
    
    /**
     * Call the serializer as a static method passing through the actual serialize functions
     * 
     * @param string $name
     * @param mixed[] $arguments
     */
    public static function __callstatic($name, $arguments)
    {
        return static::getSerializer()->{$name}(...$arguments);
    }
    
}