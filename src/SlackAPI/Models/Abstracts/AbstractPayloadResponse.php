<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\SerializerBuilder;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use JMS\Serializer\Handler\HandlerRegistry;

/**
 * Provides ok, error and warning properties for received Slack payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.1
 * 
 * @method bool getOk()
 * @method string getError()
 * @method string getWarning()
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
        $this->validateRequired($this);
        $serializer = SerializerBuilder::create()
            ->configureHandlers(function(HandlerRegistry $registry) {
                $enumHandler = function($visitor, $value, array $type) {
                    var_dump($type);
                    return $object->getValue();
                };
                
                $registry->registerHandler('deserialization', 'SlackPHP\SlackAPI\Enumerators\ActionDataSource', 'json', $enumHandler);
                $registry->registerHandler('deserialization', 'SlackPHP\SlackAPI\Enumerators\ActionStyle', 'json', $enumHandler);
                $registry->registerHandler('deserialization', 'SlackPHP\SlackAPI\Enumerators\ActionType', 'json', $enumHandler);
                $registry->registerHandler('deserialization', 'SlackPHP\SlackAPI\Enumerators\Method', 'json', $enumHandler);
                $registry->registerHandler('deserialization', 'SlackPHP\SlackAPI\Enumerators\MrkdwnIn', 'json', $enumHandler);
                $registry->registerHandler('deserialization', 'SlackPHP\SlackAPI\Enumerators\Parse', 'json', $enumHandler);
                $registry->registerHandler('deserialization', 'SlackPHP\SlackAPI\Enumerators\ResponseType', 'json', $enumHandler);
            })
            ->build()
        ;
        $payloadResponseObject = $serializer->deserialize($responseContents, static::class, 'json');
        
        if (!is_bool($payloadResponseObject->getOk())) {
            throw new SlackException('Ok status property not received with slack api response JSON payload', SlackException::OK_STATUS_NOT_RECEIVED);
        }
        
        return $payloadResponseObject;
    }
}