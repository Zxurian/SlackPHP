<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ActionStyle extends Enum
{
    const DEFAULT_STYLE = 'default';
    const PRIMARY_STYLE = 'primary';
    const DANGER_STYLE = 'danger';
}