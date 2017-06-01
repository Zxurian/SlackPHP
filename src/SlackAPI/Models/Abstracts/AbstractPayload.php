<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Enumerators\Method;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * Abstract class for individual Slack Payloads 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getToken()
 * @ExclusionPolicy("none")
 */
abstract class AbstractPayload extends AbstractModel implements PayloadInterface
{
    /**
     * @var string|null
     */
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
}