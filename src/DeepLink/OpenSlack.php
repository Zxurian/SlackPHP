<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Exceptions\DeepLinkException;
use SlackPHP\DeepLink\Abstracts\DeepLink;

/**
 * Create DeepLink url to open Slack and Slack team
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @version 0.3
 * @package DeepLink
 * @see https://api.slack.com/docs/deep-linking#open_slack
 */
class OpenSlack extends DeepLink
{
    const BASE = 'open';
    
    /** @var string|null */
    private $teamId = null;
    
    /**
     * Setter for teamId
     *
     * @param string $teamId
     * @return OpenSlack
     */
    public function setTeamId($teamId)
    {
        if (!is_scalar($teamId)) {
            throw new \InvalidArgumentException('Team id should be scalar');
        }
        
        $this->teamId = (string)$teamId;
    
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
        
        if ($this->teamId !== null) {
            $return['team'] = $this->teamId;
        }
            
        return $return;
    }
}