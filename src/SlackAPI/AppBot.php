<?php

namespace SlackPHP\SlackAPI;

use SlackPHP\SlackAPI\Enumerators\Method;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;

/**
 * Specific Model for sending payloads as an Application Bot
 * 
 * @author Zxurian
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/bot-users
 * @package SlackAPI
 * @version 0.2
 * 
 * @method void __construct() Provide your App Bot specific OAuth token
 */
class AppBot extends SlackAPI
{
    /**
     * Send payload with App Bot
     * 
     * @param AbstractPayload $payload
     * @throws SlackException
     * @return AbstractPayloadResponse
     */
    public function send(AbstractPayload $payload) 
    {
        if (!$payload->getMethod()->isAvailableToAppBot()) {
            throw new SlackException('The payload method provided can’t be used by App Bot', SlackException::INVALID_APPBOT_METHOD);
        }
        
        return parent::send($payload);
    }
}