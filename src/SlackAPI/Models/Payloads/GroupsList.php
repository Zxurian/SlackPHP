<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;

/**
 * Class to create payload for getting a list of private channels in the team
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class GroupsList extends AbstractPayload
{
    /**
     * @var bool|NULL
     */
    private $excludeArchived = null;
    
    /**
     * Setter for excludeArchived
     * 
     * @param bool $excludeArchived
     * @return ChannelsList
     */
    public function setExcludeArchived($excludeArchived)
    {
        $this->excludeArchived = $excludeArchived;
        
        return $this;
    }
    
    /**
     * Getter for excludeArchived
     * 
     * @return bool
     */
    public function getExcludeArchived()
    {
        return $this->excludeArchived;
    }
    
    /**
     * Getter for current API method, used for url
     *
     * @inheritdoc
     */
    public function getMethod()
    {
        return 'groups.list';
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