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
    
    private function __construct()
    {
        // Load JMS namespace specifically
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
            ->configureHandlers(function(HandlerRegistry $registry) {
                $registry->registerHandler('deserialization', 'MyCLabsEnum', 'json',
                    function(VisitorInterface $visitor, $data, array $type) {
                        return new $type['params'][0]($data);
                    }
                );
            })
            ->build()
        ;
        
    }
    
    private function __clone(){}
    
    private function __wakeup(){}
    
    /**
     * Get the Serializer Singleton
     * 
     * @return \JMS\Serializer\Serializer
     */
    public static function getSerializer()
    {
        if (static::$serializer === null) {
            static::$serializer = new self();
        }
        
        return static::$serializer;
    }
    
}