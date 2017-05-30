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
use SlackPHP\SlackAPI\Enumerators\Method;

/**
 * Abstract class for individual Slack Payloads 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getToken()
 */
abstract class AbstractPayload extends AbstractModel implements PayloadInterface
{
    /** @var string|null */
    protected $token = null;
    
    /**
     * Authentication token.
     * Required for all payloads
     *
     * @param string $token
     * @throws \InvalidArgumentException
     * @return AbstractPayload
     */
    public function setToken($token)
    {
        if (!is_scalar($token)) {
            throw new \InvalidArgumentException('Token should be a scalar');
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
     * @return Method
     */
    public function getMethod()
    {
        return Method::{static::METHOD}();
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
     * Validate and prepare payload as single level array for sending to Slack’s API
     * 
     * @return array
     */
    public function preparePayloadForWebAPI()
    {
        // Validate the payload to make sure it has all the necessary requirements
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