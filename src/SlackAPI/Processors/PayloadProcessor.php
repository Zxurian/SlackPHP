<?php

namespace SlackPHP\SlackAPI\Processors;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractProcessor;
use SlackPHP\SlackAPI\Exceptions\SerializerException;
use function GuzzleHttp\json_encode;
use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;

/**
 * Class processes payload, for sending to Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class PayloadProcessor extends AbstractProcessor
{
    /**
     * Getting payload ready for use with request
     * 
     * @param AbstractPayload $payload
     * @return array Processed payload
     */
    public function process(AbstractPayload $payload)
    {
        $serializedPayload = $this->serializer->serialize($payload, 'json');
        
        if (!$serializedPayload || !is_string($serializedPayload)) {
            throw new SerializerException('The result of serialization should be a string. The result is:'. var_export($serializedPayload,true), SerializerException::NOT_STRING);
        }
        
        $decodedPayload = json_decode($serializedPayload, true);
        foreach($decodedPayload as $key => $value) {
            if (is_array($value)) {
                $decodedPayload[$key] = json_encode($value);
            }
        }
        return $decodedPayload;
    }
}