<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;

/**
 * Class creates payload to get users list of the team
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class UsersList extends AbstractPayload
{
    /**
     * @var bool|NULL
     */
    private $presence = null;
    
    /**
     * Setter for presence
     *
     * @param bool $presence
     * @return UsersList
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;
    
        return $this;
    }
    
    /**
     * Getter for presence
     *
     * @return bool|NULL
     */
    public function getPresence()
    {
        return $this->presence;
    }
    
    /**
     * Getter for current API method, used for url
     *
     * @inheritdoc
     */
    public function getMethod()
    {
        return 'users.list';
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Interfaces\PayloadInterface::hasRequiredProperties()
     */
    public function hasRequiredProperties()
    {
        return true;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Interfaces\PayloadInterface::getMissingRequiredProperties()
     */
    public function getMissingRequiredProperties()
    {
        return [];
    }
}