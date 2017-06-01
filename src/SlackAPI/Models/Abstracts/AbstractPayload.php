<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Enumerators\Method;
use JMS\Serializer\Serializer;

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
    
    /** @var Serializer */
    protected $serializer = null;
    
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
        return new Method(static::METHOD);
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
     * Get the custom built serializer
     * 
     * @return Serializer
     */
    protected function getSerializer()
    {
        if ($this->serializer === null) {
            $this->serializer = \SlackPHP\SlackAPI\Serialization\Serializer::getSerializer();
        }
        
        return $this->serializer;
    }
    
    /**
     * Convert the payload to a single level array for use with http_query_vars
     * Lower level arrays will be converted to JSON
     * 
     * @return string
     */
    public function convertToWebAPIArray()
    {
        $arrayPayload = $this->getSerializer()->toArray($this);
        
        foreach($arrayPayload as $key => $value) {
            if (is_array($value)) {
                $arrayPayload[$key] = json_encode($value);
            }
        }
        
        return $arrayPayload;
    }
    
}