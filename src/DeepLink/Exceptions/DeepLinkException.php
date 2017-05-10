<?php

namespace SlackPHP\DeepLink\Exceptions;

/**
 * Class for Exceptions that can be thrown on DeepLink generation
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class DeepLinkException extends \Exception
{
    const NOT_SCALAR = 100;
    const TEAM_ID_NOT_SET = 101;
    const CHANNEL_ID_NOT_SET = 102;
    const USER_ID_NOT_SET = 103;
    const FILE_ID_NOT_SET = 104;
    const NOT_BOOLEAN = 105;
    const NOT_INTEGER = 106;
    const QUERY_NOT_SET = 107;
}