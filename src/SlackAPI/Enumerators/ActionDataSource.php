<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ActionDataSource extends Enum
{
    const static = 'static';
    const users = 'users';
    const channels = 'channels';
    const conversations = 'conversations';
    const external = 'external';
}