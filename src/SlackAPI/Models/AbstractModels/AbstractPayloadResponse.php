<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use SlackPHP\SlackAPI\Interfaces\PayloadResponseInterface;
use JMS\Serializer\Annotation\Type;

/**
 * Privides ok and error properties for deserialization of received payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
abstract class AbstractPayloadResponse implements PayloadResponseInterface
{
    /**
     * @var bool|NULL
     * @Type("boolean")
     */
    private $ok = null;

    /**
     * @var string|NULL
     * @Type("string")
     */
    private $error = null;

    /**
     * @inheritdoc
     */
    public function isOk()
    {
        return (bool)$this->ok;
    }

    /**
     * @inheritdoc
     */
    public function getError()
    {
        return $this->error;
    }
}