<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ActionStyle extends Enum
{
    const defaultStyle = 'default';
    const primaryStyle = 'primary';
    const dangerStyle = 'danger';
}