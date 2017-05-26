<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ActionStyle extends Enum
{
    const default = 'default';
    const primary = 'primary';
    const danger = 'danger';
}