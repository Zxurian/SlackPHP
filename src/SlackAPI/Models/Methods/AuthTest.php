<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Enumerators\Method;

/**
 * This method checks authentication and tells you who you are.
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/methods/auth.test
 * @package SlackAPI
 * @version 0.2
 * 
 */
class AuthTest extends AbstractPayload
{
    const METHOD = METHOD::AUTH_TEST;
    
    public function validatePayload(){}
}