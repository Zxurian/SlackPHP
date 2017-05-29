<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\VisitorInterface;
use MyCLabs\Enum\Enum;

/**
 * Abstract class for individual Slack Payloads 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.2
 * 
 */
abstract class AbstractPayload extends AbstractModel implements PayloadInterface
{
    /**
     * @var string
     */
    protected $token = null;
    
    /**
     * Setter for token
     *
     * @param string $token
     * @throws \InvalidArgumentException
     * @return AbstractPayload
     */
    public function setToken($token)
    {
        if (!is_scalar($token)) {
            throw new \InvalidArgumentException('Token should be a scalar type');
        }
        
        $this->token = $token;
        
        return $this;
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
     * {@inheritDoc}
     * @see \SlackAPI\Models\Abstracts\ValidateInterface::validateModel()
     */
    public function validateModel()
    {
        if ($this->token === null) {
            throw new SlackException('Every payload must have a token', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        $this->validatePayload();
    }
    
    /**
     * Validate and prepare payload as single level array for sending to slack
     * 
     * @return array
     */
    public function preparePayloadForSlack()
    {
        $this->validateRequired($this);
        $serializer = SerializerBuilder::create()
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
                $registry->registerHandler('serialization', 'MyClabs\Enum\Enum', 'json', 
                    function(VisitorInterface $visitor, Enum $object, array $type) {
                        return $object->getValue();
                    }
                );
            })
            ->build()
        ;
        $arrayPayload = $serializer->toArray($this);
        
        foreach($arrayPayload as $key => $value) {
            if (is_array($value)) {
                $arrayPayload[$key] = json_encode($value);
            }
        }
        
        return $arrayPayload;
    }
    
}