<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ActionDataSource extends Enum
{
    const STATIC_SOURCE = 'static';
    const USERS_SOURCE = 'users';
    const CHANNELS_SOURCE = 'channels';
    const CONVERSATIONS_SOURCE = 'conversations';
    const EXTERNAL_SOURCE = 'external';
}