<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ActionType extends Enum
{
    const BUTTON = 'button';
    const SELECT = 'select';
}