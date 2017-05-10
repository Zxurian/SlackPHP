<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Interfaces\LinkInterface;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;
use SlackPHP\DeepLink\Abstracts\DeepLink;

/**
 * Create DeepLink url to open Slack channel 
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class OpenChannel extends DeepLink implements LinkInterface
{
    const BASE = 'channel';
    
    /**
     * @var string
     */
    private $teamId = null;
    
    /**
     * @var string
     */
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
            throw new DeepLinkException('Team id should be scalar type', DeepLinkException::NOT_SCALAR);
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
            throw new DeepLinkException('Channel id should be scalar type', DeepLinkException::NOT_SCALAR);
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
            throw new DeepLinkException('Team id is not set', DeepLinkException::TEAM_ID_NOT_SET);
        }
        
        if ($this->channelId === null) {
            throw new DeepLinkException('Channel id is not set', DeepLinkException::CHANNEL_ID_NOT_SET);
        }
        
        $return['team'] = $this->teamId;
        $return['id'] = $this->channelId;
        
        return $return;
    }
}