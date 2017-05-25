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
     * Base URL for Slack API
     */
    protected $endpoint = 'https://slack.com/api/';
    
   /**
    * @param string|null $token
    * @throws SlackException
    */
    public function __construct($token = null) 
    {
        if ($token !== null && !is_scalar($token)) {
            throw new SlackException('Token should be scalar type', SlackException::NOT_SCALAR);
        }
        
        $this->token = (string)$token;
    }
}