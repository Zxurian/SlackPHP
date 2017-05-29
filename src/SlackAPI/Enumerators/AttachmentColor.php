<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

/**
 * Enumerator for Attachment Colors
 * 
 * @author Zxurian
 * @version 0.1
 * @package SlackAPI
 * @see https://api.slack.com/docs/message-attachments
 *
 */
class AttachmentColor extends Enum
{
    const GOOD = 'good';
    const WARNING = 'warning';
    const DANGER = 'danger';
}