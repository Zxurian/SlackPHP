<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Abstracts\DeepLink;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * Create DeepLink url to open direct message in Slack
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/docs/deep-linking#open_a_direct_message
 * @package DeepLink
 * @version 0.3
 */
class OpenDirectMessage extends DeepLink
{
    const BASE = 'user';

    /** @var string|null */
    private $teamId = null;
    
    /** @var string|null */
    private $userId = null;
    
    /**
     * Setter for teamId
     *
     * @param string $teamId
     * @return OpenDirectMessage
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
     * Setter for userId
     *
     * @param string $userId
     * @return OpenDirectMessage
     */
    public function setUserId($userId)
    {
        if (!is_scalar($userId)) {
            throw new \InvalidArgumentException('User ID should be scalar');
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
        if ($this->teamId === null) {
            throw new DeepLinkException('Team ID is not set', DeepLinkException::TEAM_ID_NOT_SET);
        }
        
        if ($this->userId === null) {
            throw new DeepLinkException('User ID is not set', DeepLinkException::USER_ID_NOT_SET);
        }
        
        return [
            'team'  => $this->teamId,
            'id'    => $this->userId,
        ];
    }
}