<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Enumerators\Method;

/**
 * This method returns a list of all channels in the team.
 * This includes channels the caller is in, channels they are not currently in, and archived channels but does not include private channels. The number of (non-deactivated) members in each channel is also returned.
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/methods/channels.list
 * @package SlackAPI
 * @version 0.2
 * 
 * @method bool getExcludeArchived()
 * @method bool getExcludeMembers()
 */
class ChannelsList extends AbstractPayload
{
    const method = Method::channelsList;
    
    /**
     * Exclude archived channels from the list
     * @var bool
     */
    protected $excludeArchived = false;
    
    /**
     * Exclude the members collection from each channel
     * @var bool
     */
    protected $excludeMembers = false;
    
    /**
     * Setter for excludeArchived
     * 
     * @param bool $excludeArchived
     * @throws \InvalidArgumentException
     * @return ChannelsList
     */
    public function setExcludeArchived($excludeArchived)
    {
        if (!is_bool($excludeArchived)) {
            throw new \InvalidArgumentException('Exclude archived property should be a boolean type');
        }
        
        $this->excludeArchived = $excludeArchived;
        
        return $this;
    }
    
    /**
     * Setter for excludeMembers
     * 
     * @param bool $excludeMembers
     * @throws \InvalidArgumentException
     * @return ChannelsList
     */
    public function setExcludeMembers($excludeMembers)
    {
        if (!is_bool($excludeMembers)) {
            throw new \InvalidArgumentException('Exclude members property should be a boolean type');
        }
        
        $this->excludeMembers = $excludeMembers;
        
        return $this;
    }
    /**
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Models\Abstracts\PayloadInterface::validatePayload()
     */
    protected function validatePayload(){}
    
}