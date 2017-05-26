<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

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
     * Check to make sure all requirements are met on the payload
     */
    protected function validatePayload();
}