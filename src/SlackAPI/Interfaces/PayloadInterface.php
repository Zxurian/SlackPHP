<?php 

/*
 * Interface for all the payloads, that can be sent
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */

namespace SlackPHP\SlackAPI\Interfaces;

/**
 * Interface for for all the payloads classes, sent to Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
interface PayloadInterface
{
    /**
     * Get API method name used for payload
     * 
     * @return string
     */
    public function getMethod();
    
    /**
     * Get class name, used to process the response payload
     * 
     * @return string
     */
    public function getResponseClass();
    
    /**
     * Check that all required properties are set
     * 
     * @return bool
     */
    public function hasRequiredProperties();
    
    /**
     * Get all the missing required properties from payload
     * 
     * @return array
     */
    public function getMissingRequiredProperties();
}