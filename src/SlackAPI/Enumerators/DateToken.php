<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

/**
 * Enumerator for date tokens
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @version 0.1
 * @package SlackAPI
 * @see https://api.slack.com/docs/message-formatting#formatting_dates
 *
 */
class DateToken extends Enum
{
    const DATE_NUM = '{date_num}';
    const DATE = '{date}';
    const DATE_SHORT = '{date_short}';
    const DATE_LONG = '{date_long}';
    const DATE_PRETTY = '{date_pretty}';
    const DATE_SHORT_PRETTY = '{date_short_pretty}';
    const DATE_LONG_PRETTY = '{date_long_pretty}';
    const TIME = '{time}';
    const TIME_SECS = '{time_secs}';
}