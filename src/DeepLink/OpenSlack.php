<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Interfaces\LinkInterface;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;
use SlackPHP\DeepLink\Abstracts\DeepLink;

/**
 * Create DeepLink url to open Slack and Slack team
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class OpenSlack extends DeepLink implements LinkInterface
{
    const BASE = 'open';
    
    /**
     * @var scalar
     */
    private $teamId = null;
    
    /**
     * Setter for teamId
     *
     * @param scalar $teamId
     * @return OpenSlack
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