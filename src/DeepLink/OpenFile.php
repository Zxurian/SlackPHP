<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Interfaces\LinkInterface;
use SlackPHP\DeepLink\Abstracts\DeepLink;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * Create DeepLink url to open file in Slack
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class OpenFile extends DeepLink implements LinkInterface
{
    const BASE = 'file';
    
    /**
     * @var scalar
     */
    private $teamId = null;
    
    /**
     * @var scalar
     */
    private $fileId = null;
    
    /**
     * Setter for teamId
     *
     * @param scalar $teamId
     * @return OpenFile
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
     * Setter for fileId
     *
     * @param scalar $fileId
     * @return OpenFile
     */
    public function setFileId($fileId)
    {
        if (!is_scalar($fileId)) {
            throw new \Exception('File id should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->fileId = $fileId;
    
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
        
        if ($this->fileId === null) {
            throw new DeepLinkException('File id is not set', DeepLinkException::FILE_ID_NOT_SET);
        }
        
        $return['team'] = $this->teamId;
        $return['id'] = $this->fileId;
        
        return $return;
    }
}