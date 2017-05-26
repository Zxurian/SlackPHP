<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ActionType extends Enum
{
    const button = 'button';
    const select = 'select';
}