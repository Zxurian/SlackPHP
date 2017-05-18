<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\SerializerBuilder;
use SlackPHP\SlackAPI\Exceptions\SerializerException;

/**
 * Privides ok and error properties for deserialization of received payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.1
 * 
 * @method bool getOk()
 * @method string getError()
 */
abstract class AbstractPayloadResponse extends MagicGetter
{
    /**
     * @var bool|NULL
     * @Type("boolean")
     */
    protected $ok = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $error = null;
    
    /**
     * Deserializes the responce from Slack API
     *
     * @param string $responseContents
     *
     * @return AbstractPayloadResponse
     */
    public static function parseResponse($responseContents)
    {
        $serializer = SerializerBuilder::create()->build();
        $payloadResponseObject = $serializer->deserialize($responseContents, static::class, 'json');
        
        if (!($payloadResponseObject instanceof AbstractPayloadResponse)) {
            throw new SerializerException('The result of deserialization should be '.$payloadResponseClass.' but received '.(is_object($payloadResponseObject) ? 'instance of '.get_class($payloadResponseObject) : gettype($payloadResponseObject)), SerializerException::SERIALIZATION_TYPE);
        }
    
        return $payloadResponseObject;
    }
}