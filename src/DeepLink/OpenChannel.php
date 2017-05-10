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
     * @var scalar
     */
    private $teamId = null;
    
    /**
     * @var scalar
     */
    private $channelId = null;
    
    /**
     * Setter for teamId
     *
     * @param scalar $teamId
     * @return OpenChannel
     */
    public function setTeamId($teamId)
    {
        if (!is_scalar($teamId)) {
            throw new DeepLinkException('Team id should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->teamId = $teamId;
    
        return $this;
    }
    
    /**
     * Setter for channelId
     *
     * @param scalar $channelId
     * @return OpenChannel
     */
    public function setChannelId($channelId)
    {
        if (!is_scalar($channelId)) {
            throw new \Exception('Channel id should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->channelId = $channelId;
    
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
            throw new DeepLinkException('Channel id is not set', DeepLinkException::CANNEL_ID_NOT_SET);
        }
        
        $return['team'] = $this->teamId;
        $return['id'] = $this->channelId;
        
        return $return;
    }
}