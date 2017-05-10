<?php

namespace SlackPHP\SlackAPI\Exceptions;

/**
 * Class for Slack exceptions
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class SlackException extends \Exception
{
    const CANT_SERIALIZE_PAYLOAD = 100;
    const NO_TOKEN_SET = 101;
    const REQUEST_FAILED = 102;
    const RESPONSE_FAILED = 103;
    const JSON_DECODING = 104;
    const NOT_200_FROM_SLACK_SERVER = 105;
    const MORE_THAN_5_ACTIONS_IN_ATTACHMENT = 106;
    const NO_TEXT = 107;
    const CHANNEL_NOT_SET = 108;
    const TEXT_NOT_SET = 109;
    const TS_NOT_SET = 110;
}