<?php

namespace SlackPHP\SlackAPI\Models\Objects;

use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;

/**
 * Model of file
 *
 * @author Zxurian
 * @see https://api.slack.com/types/usergroup
 * @package SlackAPI
 * @version 0.1
 * 
 * @method Channel[] getChannels()
 * @method Group[] getGroups()
 */
class Prefs extends MagicGetter
{
    /**
     * @var Channel[]
     * @Type("array<SlackPHP\SlackAPI\Models\Objects\Channel>")
     */
    protected $channels = [];
    
    /**
     * @var Group[]
     * @Type("array<SlackPHP\SlackAPI\Models\Objects\Group>")
     */
    protected $groups = [];
}