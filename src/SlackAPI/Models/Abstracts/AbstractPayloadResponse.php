<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\SerializerBuilder;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\VisitorInterface;
use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use MyCLabs\Enum\Enum;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

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
     * @var bool|null
     * @Type("boolean")
     */
    protected $ok = null;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $error = null;
    
    /**
     * @var string|null
     * @Type("string")
     */
    protected $warning = null;
    
    /**
     * Deserializes the response from Slack Web API and instantiates a 
     *
     * @param string $responseContents
     * @return AbstractPayloadResponse
     */
    public static function parseResponse($responseContents)
    {
        $serializer = SerializerBuilder::create()
            ->configureHandlers(function(HandlerRegistry $registry) {
                $registry->registerHandle('deserialization', 'MyCLabsEnum', 'json',
                    function(VisitorInterface $visitor, $data, array $type) {
                        return new $type['params'][0]($data);
                    }
                );
            })
            ->build()
        ;
        $payloadResponseObject = $serializer->deserialize($responseContents, static::class, 'json');
        
        return $payloadResponseObject;
    }
}