<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\SerializerBuilder;
use Doctrine\Common\Annotations\Annotation\Required;

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
     * @Required
     */
    protected $ok = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $error = null;
    
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $warning = null;
    
    /**
     * Deserializes the responce from Slack API
     *
     * @param string $responseContents
     * @return AbstractPayloadResponse
     */
    public static function parseResponse($responseContents)
    {
        $serializer = SerializerBuilder::create()->build();
        $payloadResponseObject = $serializer->deserialize($responseContents, static::class, 'json');
        
        if (!is_bool($payloadResponseObject->getOk())) {
            throw new SlackException('Ok status property not received with slack api response JSON payload', SlackException::OK_STATUS_NOT_RECEIVED);
        }
        
        return $payloadResponseObject;
    }
}