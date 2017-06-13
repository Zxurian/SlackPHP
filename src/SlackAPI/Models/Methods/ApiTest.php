<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Enumerators\Method;

/**
 * This method helps you test your calling code.
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/methods/api.test
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getError()
 * @method string getFoo()
 */
class ApiTest extends AbstractPayload
{
    const METHOD = method::API_TEST;
    
    /** @var string|NULL */
    protected $error = null;
    
    /** @var string|NULL */
    protected $foo = null;
    
    /**
     * Error response to return
     *
     * @see https://api.slack.com/methods/api.test
     * @param string $error
     * @throws \InvalidArgumentException
     * @return ApiTest
     */
    public function setError($error)
    {
        if (!is_scalar($error)) {
            throw new \InvalidArgumentException('Error should be a scalar type');
        }
        
        $this->error = (string)$error;
        
        return $this;
    }
    
    /**
     * Example property to return
     *
     * @see https://api.slack.com/methods/api.test
     * @param string $error
     * @throws \InvalidArgumentException
     * @return ApiTest
     */
    public function setFoo($foo)
    {
        if (!is_scalar($foo)) {
            throw new \InvalidArgumentException('Foo should be a scalar type');
        }
    
        $this->foo = (string)$foo;
    
        return $this;
    }
    
    public function validatePayload(){}
}