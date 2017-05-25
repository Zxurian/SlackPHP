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
class AppBot extends SlackAPI
{
    /**
     * @var SlackAPI
     */
    protected $slackAPI;
    
    /**
     * Base URL for App Bot
     */
    protected $endpoint = 'https://slack.com/api/';
    
    /**
     * @param SlackAPI $slackAPI
     */
    public function __construct(SlackAPI $slackAPI) 
    {
        $this->slackAPI = $slackAPI;
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
            throw new SlackException('The method provided can’t be used by App Bot', SlackException::INVALID_APPBOT_METHOD);
        }
        
        return $this->slackAPI->send($payload, $this->endpoint);
    }
}