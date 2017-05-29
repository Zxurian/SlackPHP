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
    const GOOD = '2FA44F';
    const WARNING = 'DE9E31';
    const DANGER = 'D50200';
}