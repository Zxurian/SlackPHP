<?php

namespace SlackPHP\SlackAPI\Serialization;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use SecurityLib\Enum;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\VisitorInterface;
use JMS\Serializer\Serializer;

class Serializer
{
    /** @var Serializer */
    private static $serializer = null;
    
    private function __construct(){}
    
    private function __clone(){}
    
    private function __wakeup(){}
    
    /**
     * Get the Serializer Singleton
     * 
     * @return Serializer
     */
    public static function getSerializer()
    {
        if (static::$serializer === null) {
            static::$serializer = SerializerBuilder::create()
                ->configureListeners(function(EventDispatcher $dispatcher) {
                    $dispatcher->addListener(Events::PRE_SERIALIZE,
                        function(PreSerializeEvent $event) {
                            if ($event->getObject() instanceof Enum) {
                                $event->setType('MyClabs\Enum\Enum');
                            }
                        }
                        );
                })
                ->configureHandlers(function(HandlerRegistry $registry) {
                    $registry->registerHandler('serialization', 'MyClabs\Enum\Enum', 'array',
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
        static::getSerializer()->{$name}(...$arguments);
    }
    
}