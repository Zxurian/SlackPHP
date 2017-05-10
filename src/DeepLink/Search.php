<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Interfaces\LinkInterface;
use SlackPHP\DeepLink\Abstracts\DeepLink;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * Create DeepLink url to open Slack team and do search
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class Search extends DeepLink implements LinkInterface
{
    const BASE = 'search';

    /**
     * @var scalar
     */
    private $teamId = null;
    
    /**
     * @var scalar
     */
    private $query = null;
    
    /**
     * @var scalar
     */
    private $sort = null;
    
    /**
     * @var bool
     */
    private $highlight = null;
    
    /**
     * @var int
     */
    private $count = null;
    
    /**
     * @var int
     */
    private $page = null;
    
    /**
     * Setter for teamId
     * 
     * @param scalar $teamId
     * @return Search
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
     * Setter for query
     *
     * @param scalar $query
     * @return Search
     */
    public function setQuery($query)
    {
        if (!is_scalar($query)) {
            throw new DeepLinkException('Query should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->query = $query;
    
        return $this;
    }
    
    /**
     * Setter for sort
     *
     * @param scalar $sort
     * @return Search
     */
    public function setSort($sort)
    {
        if (!is_scalar($sort)) {
            throw new DeepLinkException('Sort should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->sort = $sort;
    
        return $this;
    }
    
    /**
     * Setter for highlight
     *
     * @param bool $highlight
     * @return Search
     */
    public function setHighlight($highlight)
    {
        if (!is_bool($highlight)) {
            throw new DeepLinkException('Highlight should be boolean type', DeepLinkException::NOT_BOOLEAN);
        }
        
        $this->highlight = $highlight;
    
        return $this;
    }
    
    /**
     * Setter for count
     *
     * @param int $count
     * @return Search
     */
    public function setCount($count)
    {
        if (!is_int($count)) {
            throw new DeepLinkException('Count should be integer type', DeepLinkException::NOT_INTEGER);
        }
        
        $this->count = $count;
    
        return $this;
    }
    
    /**
     * Setter for page
     *
     * @param int $page
     * @return Search
     */
    public function setPage($page)
    {
        if (!is_int($page)) {
            throw new DeepLinkException('page should be integer type', DeepLinkException::NOT_INTEGER);
        }
        
        $this->page = $page;
    
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
    
        if ($this->query === null) {
            throw new DeepLinkException('Query is not set', DeepLinkException::QUERY_NOT_SET);
        }
        
        if ($this->sort !== null) {
            $return['sort'] = $this->sort;
        }
        
        if ($this->highlight !== null) {
            $return['highlight'] = $this->highlight;
        }
        
        if ($this->count !== null) {
            $return['count'] = $this->count;
        }
        
        if ($this->page !== null) {
            $return['page'] = $this->page;
        }
        
        $return['team'] = $this->teamId;
        $return['query'] = $this->query;

        return $return;
    }
}