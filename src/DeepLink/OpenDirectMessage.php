<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Interfaces\LinkInterface;
use SlackPHP\DeepLink\Abstracts\DeepLink;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * Create DeepLink url to open direct message in Slack
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class OpenDirectMessage extends DeepLink implements LinkInterface
{
    const BASE = 'user';

    /**
     * @var string
     */
    private $teamId = null;
    
    /**
     * @var string
     */
    private $userId = null;
    
    /**
     * Setter for teamId
     *
     * @param scalar $teamId
     * @return OpenDirectMessage
     */
    public function setTeamId($teamId)
    {
        if (!is_scalar($teamId)) {
            throw new DeepLinkException('Team ID should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->teamId = (string)$teamId;
    
        return $this;
    }
    
    /**
     * Setter for userId
     *
     * @param scalar $userId
     * @return OpenDirectMessage
     */
    public function setUserId($userId)
    {
        if (!is_scalar($userId)) {
            throw new DeepLinkException('User ID should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->userId = (string)$userId;
    
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
        
        if ($this->userId === null) {
            throw new DeepLinkException('User ID is not set', DeepLinkException::USER_ID_NOT_SET);
        }
        
        $return['team'] = $this->teamId;
        $return['id'] = $this->userId;
        
        return $return;
    }
}