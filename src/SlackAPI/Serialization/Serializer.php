<?php

namespace SlackPHP\SlackAPI\Serialization;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use MyCLabs\Enum\Enum;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\VisitorInterface;
use Doctrine\Common\Annotations\AnnotationRegistry;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;

class Serializer
{
    /** @var \JMS\Serializer\Serializer */
    private static $serializer = null;
    
    private function __construct(){}
    
    private function __clone(){}
    
    private function __wakeup(){}
    
    /**
     * Build the custom serializer and return it
     * 
     * @return \JMS\Serializer\Serializer
     */
    private static function buildSerializer()
    {
        // Load JMS namespace specifically
        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\\Serializer\\Annotation',
            'vendor/jms/serializer/src'
        );
        
        $serializer = SerializerBuilder::create()
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
                $registry->registerHandler('serialization', 'MyCLabsEnum', 'json',
                    function(VisitorInterface $visitor, Enum $object, array $type) {
                        return $object->getValue();
                    }
                );
                $registry->registerHandler('serialization', 'SlackText', 'json',
                    function(VisitorInterface $visitor, $string, array $type) {
                        $string = str_replace(['&', '<', '>'], [ '&amp;', '&lt;', '&gt;'], $string);
                        $search = [
                            AbstractModel::LEFT_ANGLE_PLACEHOLDER,
                            AbstractModel::RIGHT_ANGLE_PLACEHOLDER,
                            AbstractModel::AMPERSAND_PLACEHOLDER,
                        ];
                        $replace = [
                            AbstractModel::LEFT_ANGLE_ACTUAL,
                            AbstractModel::RIGHT_ANGLE_ACTUAL,
                            AbstractModel::AMPERSAND_ACTUAL
                        ];
                        return str_replace($search, $replace, $string);
                    }
                );
            })
            ->configureHandlers(function(HandlerRegistry $registry) {
                $registry->registerHandler('deserialization', 'MyCLabsEnum', 'json',
                    function(VisitorInterface $visitor, $data, array $type) {
                        if (!is_array($data)) {
                            return new $type['params'][0]['name']($data);
                        }
                        
                        $return = [];
                        foreach($data as $value) {
                            $return[] = new $type['params'][0]['name']($value);
                        }
                        return $return;
                    }
                );
            })
            ->build()
        ;
            
        return $serializer;
    }
    
    /**
     * Get the Serializer Singleton
     * 
     * @return \JMS\Serializer\Serializer
     */
    public static function getSerializer()
    {
        if (static::$serializer === null) {
            static::$serializer = self::buildSerializer();
        }
        
        return static::$serializer;
    }
    
}