<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;

/**
 * This method returns a list of all users in the team.
 * This includes deleted/deactivated users.
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/methods/users.list
 * @package SlackAPI
 * @version 0.2
 * 
 * @method bool getPresence()
 */
class UsersList extends AbstractPayload
{
    const method = 'users.list';
    
    /**
     * @var bool
     */
    protected $presence = null;
    
    /**
     * Whether to include presence data in the output
     *
     * @param bool $presence
     * @return UsersList
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;
    
        return $this;
    }
    
}