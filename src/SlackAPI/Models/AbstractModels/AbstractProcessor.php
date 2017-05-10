<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * Loads serializer for serialization and deserialization of payloads
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
abstract class AbstractProcessor
{
    /**
     * @var SerializerInterface|NULL
     */
    protected $serializer = null;
    
    final public function __construct()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }
}