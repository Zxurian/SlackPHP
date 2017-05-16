<?php 

/*
 * Interface for classes, that work with Slack API directly and make calls
 */

namespace SlackPHP\SlackAPI\Interfaces;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;

/**
 * Interface for Slack API class, where all the payloads are sent to Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
interface SlackAPIInterface
{
    /**
     * @param AbstractPayload $payload Payload to be sent
     * 
     * @return AbstractPayloadResponse Processed payload from Slack API response
     */
    public function send(AbstractPayload $payload);
}