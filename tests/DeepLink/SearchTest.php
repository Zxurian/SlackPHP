<?php

use PHPUnit\Framework\TestCase;
use SlackPHP\DeepLink\Search;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * @author zxurian
 * @covers Search
 */
final class SearchTest extends TestCase
{
    public function testSettingTeamId()
    {
        $teamId = 'T12345';
        
        $Search = new Search();
        $return = $Search->setTeamId($teamId);
        
        $this->assertEquals($return, $Search);
        
        $refSearch = new ReflectionClass($Search);
        $refTeamId = $refSearch->getProperty('teamId');
        $refTeamId->setAccessible(true);
        $this->assertEquals($teamId, $refTeamId->getValue($Search));
    }
    
    public function testInvalidTeamId()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $Search = new Search();
        $Search->setTeamId([]);
    }
    
    public function testSettingQuery()
    {
        $query = 'from:bob';
        
        $Search = new Search();
        $return = $Search->setQuery($query);
        
        $this->assertEquals($return, $Search);
        
        $refSearch = new ReflectionClass($Search);
        $refTeamId = $refSearch->getProperty('query');
        $refTeamId->setAccessible(true);
        $this->assertEquals($query, $refTeamId->getValue($Search));
    }
    
    public function testInvalidQuery()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $Search = new Search();
        $Search->setQuery([]);
    }
    
    public function testSettingSort()
    {
        $sort = new \DateTime();
        
        $Search = new Search();
        $return = $Search->setSort($sort);
        
        $this->assertEquals($return, $Search);
        
        $refSearch = new ReflectionClass($Search);
        $refTeamId = $refSearch->getProperty('sort');
        $refTeamId->setAccessible(true);
        $this->assertEquals($sort, $refTeamId->getValue($Search));
    }
    
    public function testSettingHighlight()
    {
        $highlight = false;
        
        $Search = new Search();
        $return = $Search->setHighlight($highlight);
        
        $this->assertEquals($return, $Search);
        
        $refSearch = new ReflectionClass($Search);
        $refTeamId = $refSearch->getProperty('highlight');
        $refTeamId->setAccessible(true);
        $this->assertEquals($highlight, $refTeamId->getValue($Search));
    }
    
    public function testInvalidHighlight()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $Search = new Search();
        $Search->setHighlight('few');
    }
    
    public function testSettingCount()
    {
        $count = 12;
        
        $Search = new Search();
        $return = $Search->setCount($count);
        
        $this->assertEquals($return, $Search);
        
        $refSearch = new ReflectionClass($Search);
        $refTeamId = $refSearch->getProperty('count');
        $refTeamId->setAccessible(true);
        $this->assertEquals($count, $refTeamId->getValue($Search));
    }
    
    public function testInvalidCount()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $Search = new Search();
        $Search->setCount('few');
    }
    
    public function testSettingPage()
    {
        $page = 5;
        
        $Search = new Search();
        $return = $Search->setPage($page);
        
        $this->assertEquals($return, $Search);
        
        $refSearch = new ReflectionClass($Search);
        $refTeamId = $refSearch->getProperty('page');
        $refTeamId->setAccessible(true);
        $this->assertEquals($page, $refTeamId->getValue($Search));
    }
    
    public function testInvalidPage()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $Search = new Search();
        $Search->setPage('few');
    }
    
    public function testMissingTeam()
    {
        $this->expectException(DeepLinkException::class, null, DeepLinkException::TEAM_ID_NOT_SET);
        
        $Search = new Search();
        $Search->setQuery('from:foo');
        
        $Search->getQueryParameters();
    }
    
    public function testMissingQuery()
    {
        $this->expectException(DeepLinkException::class, null, DeepLinkException::QUERY_NOT_SET);
        
        $Search = new Search();
        $Search->setTeamId('T12345');
        
        $Search->getQueryParameters();
    }
    
    /**
     * @depends testSettingTeamId
     * @depends testSettingQuery
     * @depends testSettingSort
     * @depends testSettingHighlight
     * @depends testSettingCount
     * @depends testSettingPage
     * @depends testMissingTeam
     * @depends testMissingQuery
     */
    public function testGetQueryParameters()
    {
        $teamId = 'T12345';
        $query = 'from:foo';
        $sort = new \DateTime();
        $highlight = false;
        $count = 12;
        $page = 5;
        
        $Search = new Search();
        $Search
            ->setTeamId($teamId)
            ->setQuery($query)
        ;
        $returnArray = [
            'team'  => $teamId,
            'query' => $query,
        ];
        $this->assertEquals($returnArray, $Search->getQueryParameters());
        
        $Search->setSort($sort);
        $returnArray['sort'] = $sort->getTimestamp();
        $this->assertEquals($returnArray, $Search->getQueryParameters());
        
        $Search->setHighlight($highlight);
        $returnArray['highlight'] = 0;
        $this->assertEquals($returnArray, $Search->getQueryParameters());
        
        $Search->setHighlight(!$highlight);
        $returnArray['highlight'] = 1;
        $this->assertEquals($returnArray, $Search->getQueryParameters());
        
        $Search->setCount($count);
        $returnArray['count'] = $count;
        $this->assertEquals($returnArray, $Search->getQueryParameters());
        
        $Search->setPage($page);
        $returnArray['page'] = $page;
        $this->assertEquals($returnArray, $Search->getQueryParameters());
    }
    
    /**
     * @depends testGetQueryParameters
     */
    public function testGetQueryUrl()
    {
        $teamId = 'T12345';
        $query = 'from:foo';
        $sort = new \DateTime();
        $highlight = false;
        $count = 12;
        $page = 5;
        
        $Search = new Search();
        $Search
            ->setTeamId($teamId)
            ->setQuery($query)
            ->setSort($sort)
            ->setHighlight($highlight)
            ->setCount($count)
            ->setPage($page)
        ;
        
        $queryString = 'slack://search?team=T12345&query=from%3Afoo&sort='.$sort->getTimestamp().'&highlight=0&count=12&page=5';
        
        $this->assertEquals($queryString, $Search->createURL());
    }
}