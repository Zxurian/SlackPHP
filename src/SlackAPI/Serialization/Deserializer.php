<?php

namespace SlackPHP\SlackAPI\Serialization;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\VisitorInterface;
use JMS\Serializer\Serializer;
use Doctrine\Common\Annotations\AnnotationRegistry;

class Deserializer
{
    /** @var \JMS\Serializer\Serializer */
    private static $deserializer = null;
    
    private function __construct()
    {
        AnnotationRegistry::registerAutoloadNamespace(
            'Doctrine',
            'vendor/doctrine'
        );
        AnnotationRegistry::registerLoader('class_exists');
    }
    
    private function __clone(){}
    
    private function __wakeup(){}
    
    /**
     * Get the Deserializer Singleton
     * 
     * @return \JMS\Serializer\Serializer
     */
    private static function getDeserializer()
    {
        if (static::$deserializer === null) {
            static::$deserializer = SerializerBuilder::create()
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
        return static::getDeserializer()->{$name}(...$arguments);
    }
    
}