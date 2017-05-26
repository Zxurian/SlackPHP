<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use JMS\Serializer\SerializerBuilder;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackAPI\Models\Abstracts\ValidateInterface;

/**
 * Abstract class for individual Slack Payloads 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.2
 */
abstract class AbstractPayload extends MagicGetter implements ValidateInterface
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
     * @see \SlackPHP\SlackAPI\Models\Abstracts\PayloadInterface::validateRequired()
     */
    public function validateRequired()
    {
        foreach (get_object_vars($object) as $property => $value) {
            
        }
        if ($this->token === null) {
            throw new SlackException('Every payload must have a token', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        return true;
    }
    
    /**
     * Validate and prepare payload as single level array for sending to slack
     * 
     * @return array
     */
    public function preparePayloadForSlack()
    {
        $this->validateRequired();
        $serializer = SerializerBuilder::create()->build();
        $arrayPayload = $serializer->toArray($this);
        
        foreach($arrayPayload as $key => $value) {
            if (is_array($value)) {
                $arrayPayload[$key] = json_encode($value);
            }
        }
        
        return $arrayPayload;
    }
}