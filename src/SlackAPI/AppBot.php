<?php

namespace SlackPHP\SlackAPI;

use SlackPHP\SlackAPI\Enumerators\Method;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;

/**
 * Class where the calls to Slack API using bot OAuth token are executed from
 * Provide payload to send method as App Bot
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/bot-users#method_list
 */
class AppBot
{
    /**
     * @var string|NULL
     */
    private $token = null;
    
    public function __construct($token = null)
    {
        if (is_scalar($token)) {
            $this->token = (string)$token;
        }
    }
    
    /**
     * Send payload with App Bot
     * 
     * @param AbstractPayload $payload
     * @throws SlackException
     * @return AbstractPayloadResponse
     */
    public function send(AbstractPayload $payload) 
    {
        if (!Method::isAvailableToBot($payload->getMethod())) {
            throw new SlackException('The method provided can’t be used by App Bot', SlackException::INVALID_METHOD);
        }
    
        if ($payload->getToken() === null) {
            $payload->setToken($this->token);
        }
        
        $SlackWebAPI = new SlackWebAPI();
        
        return $SlackWebAPI->send($payload);
    }
}