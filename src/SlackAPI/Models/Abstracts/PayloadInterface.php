<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Interface for Payloads
 * 
 * @author Zxurian
 * @package SlackAPI
 * @version 0.1
 */
interface PayloadInterface
{
    /**
     * Validate the Payload
     * 
     * @throws SlackException
     */
    public function validatePayload();
}