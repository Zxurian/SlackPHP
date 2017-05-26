<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

class ActionDataSource extends Enum
{
    const staticSource = 'static';
    const usersSource = 'users';
    const channelsSource = 'channels';
    const conversationsSource = 'conversations';
    const externalSource = 'external';
}