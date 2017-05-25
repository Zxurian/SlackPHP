<?php

namespace SlackPHP\SlackAPI;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;

/**
 * Class where the calls with WebAPI to Slack are executed from
 * Provide payload to send method for sending it via WebAPI
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class WebAPI extends SlackAPI
{
    /**
     * @var SlackAPI
     */
    protected $slackAPI = null;
    
    /**
     * Base URL for Web API
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
     * Send payload to Slack
     * 
     * @param AbstractPayload $payload
     * @return AbstractPayloadResponse
     */
    public function send(AbstractPayload $payload)
    {
        return $this->slackAPI->send($payload, $this->endpoint);
    }
}