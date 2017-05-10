<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * Method gets list of channels in team
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class ChannelsList extends AbstractPayload
{
    /**
     * @var bool|NULL
     */
    private $excludeArchived = null;
    
    /**
     * @var bool|NULL
     */
    private $excludeMembers = null;
    
    /**
     * Setter for excludeArchived
     * 
     * @param bool $excludeArchived
     * @return ChannelsList
     */
    public function setExcludeArchived($excludeArchived)
    {
        if (!is_bool($excludeArchived)) {
            throw new SlackException('Exclude archived property should be a boolean type', SlackException::NOT_BOOLEAN);
        }
        
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
     * Setter for excludeMembers
     * 
     * @param bool $excludeMembers
     * @return ChannelsList
     */
    public function setExcludeMembers($excludeMembers)
    {
        if (!is_bool($excludeMembers)) {
            throw new SlackException('Exclude members property should be a boolean type', SlackException::NOT_BOOLEAN);
        }
        
        $this->excludeMembers = $excludeMembers;
        
        return $this;
    }
    
    /**
     * Getter for excludeMembers
     * 
     * @return bool
     */
    public function getExcludeMembers()
    {
        return $this->excludeMembers;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Interfaces\PayloadInterface::getMethod()
     */
    public function getMethod()
    {
        return 'channels.list';
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