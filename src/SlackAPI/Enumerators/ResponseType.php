<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ResponseType extends Enum
{
    const inChannel = 'in_channel';
    const ephemeral = 'ephemeral';
}