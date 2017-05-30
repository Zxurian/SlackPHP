<?php

namespace SlackPHP\DeepLink\Exceptions;

/**
 * Class for Exceptions that can be thrown on DeepLink generation
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package DeepLink
 * @version 0.3
 */
class DeepLinkException extends \Exception
{
    const TEAM_ID_NOT_SET = 101;
    const CHANNEL_ID_NOT_SET = 102;
    const USER_ID_NOT_SET = 103;
    const FILE_ID_NOT_SET = 104;
    const QUERY_NOT_SET = 107;
}