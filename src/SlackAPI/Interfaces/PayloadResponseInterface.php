<?php 

namespace SlackPHP\SlackAPI\Interfaces;

/**
 * Interface for all the payloads, that can be received from Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
interface PayloadResponseInterface
{
    /**
     * Returns true is call was successful or false if unsuccessful
     * 
     * @return bool|NULL 
     */
    public function isOk();
    
    /**
     * Contains message string if error occured, otherwise - null
     * 
     * @return string|NULL 
     */
    public function getError();
}