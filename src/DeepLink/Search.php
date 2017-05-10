<?php

namespace SlackPHP\DeepLink;

use SlackPHP\DeepLink\Interfaces\LinkInterface;
use SlackPHP\DeepLink\Abstracts\DeepLink;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * Send the user directly to a specific search query from your application
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/docs/deep-linking#search
 */
class Search extends DeepLink implements LinkInterface
{
    const BASE = 'search';

    /**
     * @var string
     */
    private $teamId = null;
    
    /**
     * @var string
     */
    private $query = null;
    
    /**
     * @var \DateTime
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
     * @param string $teamId
     * @return Search
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
     * Setter for query
     *
     * @param string $query
     * @return Search
     */
    public function setQuery($query)
    {
        if (!is_scalar($query)) {
            throw new DeepLinkException('Query should be scalar type', DeepLinkException::NOT_SCALAR);
        }
        
        $this->query = (string)$query;
    
        return $this;
    }
    
    /**
     * Specify an epoch time value or message timestamp and we'll narrow the history to around that time
     *
     * @param \DateTime $sort
     * @return Search
     */
    public function setSort(\DateTime $sort)
    {
        $this->sort = $sort;
    
        return $this;
    }
    
    /**
     * Specify false or true to control whether matching terms should be highlighted
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
     * Paginate results this many results at a time
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
     * Navigate to this specific page of results
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
        
        $return = [
            'team'  => $this->teamId,
            'query' => $this->query,
        ];
        
        if ($this->sort !== null) {
            $return['sort'] = $this->sort->getTimestamp();
        }
        
        if ($this->highlight !== null) {
            $return['highlight'] = $this->highlight ? 1 : 0;
        }
        
        if ($this->count !== null) {
            $return['count'] = $this->count;
        }
        
        if ($this->page !== null) {
            $return['page'] = $this->page;
        }
        
        return $return;
    }
}