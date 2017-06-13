<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

/**
 * Enumerator for Special commands variables
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @version 0.1
 * @package SlackAPI
 * @see https://api.slack.com/docs/message-formatting#variables
 *
 */
class SpecialCommand extends Enum
{
    const CHANNEL = 'channel';
    const GROUP = 'group';
    const HERE = 'here';
    const EVERYONE = 'everyone';
    const SUBTEAM = 'subteam';
}