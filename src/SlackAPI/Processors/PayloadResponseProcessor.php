<?php

namespace SlackPHP\SlackAPI\Processors;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractProcessor;
use SlackPHP\SlackAPI\Exceptions\SerializerException;
use SlackPHP\SlackAPI\Interfaces\PayloadResponseInterface;
use Psr\Http\Message\ResponseInterface;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Class used to process payload received from Slack API
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class PayloadResponseProcessor extends AbstractProcessor
{
    /**
     * Deserializes the responce from Slack API
     * 
     * @param ResponseInterface $response
     * @param string $payloadResponseClass
     *
     * @return PayloadResponseInterface
     */
    public function process(ResponseInterface $response, $payloadResponseClass)
    {
        if ($response->getStatusCode() != 200) {
            throw new SlackException('Received status code should be 200, received: '.$response->getStatusCode(), SlackException::NOT_200_FROM_SLACK_SERVER);
        }

        $payloadResponseObject = $this->serializer->deserialize($response->getBody()->getContents(), $payloadResponseClass, 'json');
        
        if (!($payloadResponseObject instanceof PayloadResponseInterface)) {
            throw new SerializerException('The result of serialization should be '.$payloadResponseClass.' but received '.(is_object($payloadResponseObject) ? 'instance of '.get_class($payloadResponseObject) : gettype($payloadResponseObject)), SerializerException::SERIALIZATION_TYPE);
        }
        
        return $payloadResponseObject;
    }
}