<?php

namespace SlackPHP\SlackAPI\Exceptions;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class for Slack exceptions
 *
 * @author Zxurian
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.1
 * 
 */
class SlackException extends \Exception
{
    const CONNECTION_ERROR = 101;
    const BAD_RESPONSE = 102;
    
    const MORE_THAN_5_ACTIONS_IN_ATTACHMENT = 201;
    const MISSING_REQUIRED_FIELD = 202;
    const INVALID_APPBOT_METHOD = 203;
    const STRING_TOO_LONG = 204;
    const NOT_ENOUGH_OPTIONS = 205;
    const TOO_MANY_OPTIONS = 206;
    const INVALID_RESPONSE_TYPE = 207;
    const AS_USER_SET_WITH_USERNAME = 208;
    const AS_USER_SET_WITH_ICON_URL = 209;
    const AS_USER_SET_WITH_ICON_EMOJI = 210;
    const SELECTED_OPTION_NOT_FOUND_IN_OPTIONS = 211;
    const LABEL_REQUIRED = 212;
    const ID_REQUIRED = 213;
    const INVALID_CUSTOMBOT_METHOD = 214;

    /** @var GuzzleException */
    private $guzzleException = null;
    
    /**
     * Set the GuzzleException
     * 
     * @param TransferException $e
     * @return $this
     */
    public function setGuzzleException(GuzzleException $exception)
    {
        $this->guzzleException = $exception;
        
        return $this;
    }
    
    /**
     * Get the Guzzle Exception
     * 
     * @return GuzzleException
     */
    public function getGuzzleException()
    {
        return $this->guzzleException;
    }
}