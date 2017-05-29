<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Enumerators\Method;

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
    const METHOD = Method::USERS_LIST;
    
    /** @var bool $presence*/
    protected $presence = null;
    
    /**
     * Whether to include presence data in the output
     *
     * @param bool $presence
     * @throws \InvalidArgumentException
     * @return UsersList
     */
    public function setPresence($presence)
    {
        if (!is_bool($presence)) {
            throw new \InvalidArgumentException('Presense should be a boolean type');
        }
        
        $this->presence = $presence;
    
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Models\Abstracts\PayloadInterface::validatePayload()
     */
    public function validatePayload(){}
}