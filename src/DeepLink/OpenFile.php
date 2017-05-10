<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Interfaces\LinkInterface;
use SlackPHP\DeepLink\Abstracts\DeepLink;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * Create DeepLink url to open file in Slack
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 */
class OpenFile extends DeepLink implements LinkInterface
{
    const BASE = 'file';
    
    /**
     * @var string
     */
    private $teamId = null;
    
    /**
     * @var string
     */
    private $fileId = null;
    
    /**
     * Setter for teamId
     *
     * @param string $teamId
     * @return OpenFile
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
     * Setter for fileId
     *
     * @param string $fileId
     * @return OpenFile
     */
    public function setFileId($fileId)
    {
        if (!is_scalar($fileId)) {
            throw new DeepLinkException('File id should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->fileId = (string)$fileId;
    
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
            throw new DeepLinkException('Team id is not set', DeepLinkException::TEAM_ID_NOT_SET);
        }
        
        if ($this->fileId === null) {
            throw new DeepLinkException('File id is not set', DeepLinkException::FILE_ID_NOT_SET);
        }
        
        return [
            'team'  => $this->teamId,
            'id'    => $this->fileId,
        ];
    }
}