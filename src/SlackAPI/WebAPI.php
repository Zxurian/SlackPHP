<?php

namespace SlackPHP\SlackAPI;

use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class where the calls with WebAPI are executed from
 * Provide payload to send method for sending it to Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class WebAPI extends SlackAPI
{
    /**
     * @var string|null
     */
    protected $token = null;
    
   /**
    * @param string|null $token
    * @throws SlackException
    */
    protected function __construct($token = null) 
    {
        if (!is_scalar($token) && $token !== null) {
            throw new SlackException('Token should be scalar type', SlackException::NOT_SCALAR);
        } else {
            $this->token = (string)$token;
        }
    }
}