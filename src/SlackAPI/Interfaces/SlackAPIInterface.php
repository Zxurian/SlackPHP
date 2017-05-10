<?php 

/*
 * Interface for classes, that work with Slack API directly and make calls
 */

namespace SlackPHP\SlackAPI\Interfaces;

/**
 * Interface for Slack API class, where all the payloads are sent to Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
interface SlackAPIInterface
{
    /**
     * @param PayloadInterface $payload Payload to be sent
     * 
     * @return PayloadResponseInterface Processed payload from Slack API response
     */
    public function send(PayloadInterface $payload);
}