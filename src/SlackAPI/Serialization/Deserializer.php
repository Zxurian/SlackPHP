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

class Deserializer
{
    /** @var Serializer */
    private static $deserializer = null;
    
    private function __construct(){}
    
    private function __clone(){}
    
    private function __wakeup(){}
    
    /**
     * Get the Deserializer Singleton
     * 
     * @return Serializer
     */
    public static function getDeserializer()
    {
        if (static::$deserializer === null) {
            static::$deserializer = SerializerBuilder::create()
                ->configureHandlers(function(HandlerRegistry $registry) {
                    $registry->registerHandle('deserialization', 'MyCLabsEnum', 'json',
                        function(VisitorInterface $visitor, $data, array $type) {
                            return new $type['params'][0]($data);
                        }
                        );
                })
                ->build()
            ;
        }
        
        return static::$deserializer;
    }
    
    /**
     * Call the serializer as a static method passing through the actual serialize functions
     * 
     * @param string $name
     * @param mixed[] $arguments
     */
    public static function __callstatic($name, $arguments)
    {
        static::getDeserializer()->{$name}(...$arguments);
    }
    
}