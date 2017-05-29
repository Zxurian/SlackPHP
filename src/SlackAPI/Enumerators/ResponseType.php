<?php

namespace SlackPHP\SlackAPI\Enumerators;

use MyCLabs\Enum\Enum;

/**
 * Enumerator for ResponseType
 * 
 * @author Zxurian
 * @version 0.1
 * @package SlackAPI
 * @see https://api.slack.com/docs/interactive-message-field-guide
 *
 */
class ResponseType extends Enum
{
    /**
     * display the message to all users in the channel where a message button was clicked.
     * Messages sent in response to invoked button actions are set to in_channel by default.
     * 
     * @var string IN_CHANNEL
     */
    const IN_CHANNEL = 'in_channel';
    
    /**
     * display the message only to the user who clicked a message button.
     * Messages sent in response to Slash commands are set to ephemeral by default.
     * 
     * @var string EPHEMERAL
     */
    const EPHEMERAL = 'ephemeral';
}