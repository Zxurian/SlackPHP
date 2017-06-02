<?php

namespace SlackPHP\SlackAPI\Exceptions;

use GuzzleHttp\Exception\ClientException;

class WebhookException extends \Exception
{
    private $guzzleException = null;
    
    public function setGuzzleException(ClientException $e)
    {
        $this->guzzleException = $e;
    }
    
    public function getGuzzleException()
    {
        return $this->guzzleException;
    }
}