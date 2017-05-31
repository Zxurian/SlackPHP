<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Exceptions\DeepLinkException;
use SlackPHP\DeepLink\Abstracts\DeepLink;

/**
 * Create DeepLink url to open Slack channel 
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package DeepLink
 * @version 0.3
 * @see https://api.slack.com/docs/deep-linking#open_a_channel
 */
class OpenChannel extends DeepLink
{
    const BASE = 'channel';
    
    /** @var string|null */
    private $teamId = null;
    
    /** @var string|null */
    private $channelId = null;
    
    /**
     * Setter for teamId
     *
     * @param string $teamId
     * @return OpenChannel
     */
    public function setTeamId($teamId)
    {
        if (!is_scalar($teamId)) {
            throw new \InvalidArgumentException('Team ID should be scalar');
        }
        
        $this->teamId = (string)$teamId;
    
        return $this;
    }
    
    /**
     * Setter for channelId
     *
     * @param string $channelId
     * @return OpenChannel
     */
    public function setChannelId($channelId)
    {
        if (!is_scalar($channelId)) {
            throw new \InvalidArgumentException('Channel ID should be scalar');
        }
        
        $this->channelId = (string)$channelId;
    
        return $this;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\DeepLink\Interfaces\LinkInterface::getQueryParameters()
     */
    public function getQueryParameters()
    {
        $return = [];
        
        if ($this->teamId === null) {
            throw new DeepLinkException('Team ID is not set', DeepLinkException::TEAM_ID_NOT_SET);
        }
        
        if ($this->channelId === null) {
            throw new DeepLinkException('Channel ID is not set', DeepLinkException::CHANNEL_ID_NOT_SET);
        }
        
        return [
            'team'  => $this->teamId,
            'id'    => $this->channelId,
        ];
    }
}