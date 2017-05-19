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
 * 
 * @method bool getExcludeArchived()
 * @method bool getExcludeMembers()
 */
class ChannelsList extends AbstractPayload
{
    const method = 'channels.list';
    
    /**
     * @var bool
     */
    protected $excludeArchived = null;
    
    /**
     * @var bool
     */
    protected $excludeMembers = null;
    
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
}