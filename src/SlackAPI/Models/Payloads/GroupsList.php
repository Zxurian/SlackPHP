<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayload;

/**
 * This method returns a list of private channels in the team that the caller is in and archived groups that the caller was in.
 * The list of (non-deactivated) members in each private channel is also returned.
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/methods/groups.list
 * @package SlackAPI
 * @version 0.2
 * 
 * @method bool getExcludeArchived()
 */
class GroupsList extends AbstractPayload
{
    const method = 'groups.list';
    
    /**
     * @var bool
     */
    protected $excludeArchived = null;
    
    /**
     * Set true to not return archived private channels.
     * 
     * @param bool $excludeArchived
     * @throws \InvalidArgumentException
     * @return GroupsList
     */
    public function setExcludeArchived($excludeArchived)
    {
        if (!is_bool($excludeArchived)) {
            throw new \InvalidArgumentException('ExcludeArchived should be a boolean type');
        }
        
        $this->excludeArchived = $excludeArchived;
        
        return $this;
    }
    
}