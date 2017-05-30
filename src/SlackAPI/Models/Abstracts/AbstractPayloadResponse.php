<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Serialization\Deserializer;

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
        $payloadResponseObject = Deserializer::deserialize($responseContents, static::class, 'json');
        
        return $payloadResponseObject;
    }
}