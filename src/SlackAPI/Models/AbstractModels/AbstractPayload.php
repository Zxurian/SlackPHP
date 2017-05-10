<?php

namespace SlackPHP\SlackAPI\Models\AbstractModels;

use SlackPHP\SlackAPI\Interfaces\PayloadInterface;

/**
 * Generates name of response payload classes 
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
abstract class AbstractPayload implements PayloadInterface
{
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Interfaces\PayloadInterface::getResponseClass()
     */
    public function getResponseClass()
    {
        return get_class($this).'Response';
    }
}