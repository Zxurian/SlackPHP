<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use Doctrine\Common\Annotations\Annotation\Required;

/**
 * This method returns a list of all channels in the team.
 * This includes channels the caller is in, channels they are not currently in, and archived channels but does not include private channels. The number of (non-deactivated) members in each channel is also returned.
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/methods/channels.list
 * @package SlackAPI
 * @version 0.1
 */
class ChannelsList extends AbstractPayload
{
    /**
     * @var bool
     * @Required
     */
    private $excludeArchived = null;
    
    /**
     * @var bool
     * @Required
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