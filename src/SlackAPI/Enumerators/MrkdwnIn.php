<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class MrkdwnIn extends Enum
{
    const PRETEXT = 'pretext';
    const TEXT = 'text';
    const FIELDS = 'fields';
}