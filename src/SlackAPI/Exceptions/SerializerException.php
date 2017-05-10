<?php

namespace SlackPHP\SlackAPI\Exceptions;

/**
 * Class for serializer exceptions
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class SerializerException extends \Exception
{
    const SERIALIZATION_TYPE = 100;
    const NOT_STRING = 101;
}
