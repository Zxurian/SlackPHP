<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ResponseType extends Enum
{
    const IN_CHANNEL = 'in_channel';
    const EPHEMERAL = 'ephemeral';
}