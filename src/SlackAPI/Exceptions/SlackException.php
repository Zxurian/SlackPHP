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
    const NOT_BOOLEAN = 111;
    const NOT_STRING = 112;
    const NOT_SCALAR = 113;
    const INVALID_MRKDWN_IN_VALUES = 114;
    const MISSING_REQUIRED_FIELD = 115;
    const NOT_INT = 116;
    const OK_STATUS_NOT_RECEIVED = 117;
    const INVALID_APPBOT_METHOD = 118;
    const STRING_TOO_LONG = 119;
    const NOT_ENOUGH_OPTIONS = 120;
    const TOO_MANY_OPTIONS = 121;
    const INVALID_RESPONSE_TYPE = 122;
    const MORE_THAN_300_CHARACTERS = 124;
    const MORE_THAN_30_CHARACTERS = 125;
}