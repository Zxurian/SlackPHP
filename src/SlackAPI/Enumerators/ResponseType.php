<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ResponseType extends Enum
{
    const in_channel = 'in_channel';
    const ephemeral = 'ephemeral';
}