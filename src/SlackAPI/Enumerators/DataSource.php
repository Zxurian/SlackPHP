<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class DataSource extends Enum
{
    const staticSourse = 'static';
    const users = 'users';
    const channels = 'channels';
    const conversations = 'conversations';
    const external = 'external';
}