<?php

namespace SlackPHP\SlackAPI;

use SlackPHP\SlackAPI\Enumerators\Method;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;

/**
 * Specific Model for sending payloads as a Custom Bot
 *
 * @author Zxurian
 * @see https://api.slack.com/bot-users
 * @package SlackAPI
 * @version 0.1
 *
 * @method void __construct() Provide your Custom Bot API Token
 */
class CustomBot extends SlackAPI
{
    /**
     * Send payload with Custom Bot
     *
     * @param AbstractPayload $payload
     * @throws SlackException
     * @return AbstractPayloadResponse
     */
    public function send(AbstractPayload $payload)
    {
        if (!$payload->getMethod()->isAvailableToCustomBot()) {
            throw new SlackException('The payload method provided can’t be used by App Bot', SlackException::INVALID_APPBOT_METHOD);
        }
        
        return parent::send($payload);
    }
}