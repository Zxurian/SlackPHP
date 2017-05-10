<?php

use PHPUnit\Framework\TestCase;
use SlackPHP\DeepLink\OpenSlack;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * @author zxurian
 * @covers OpenChannel
 */
final class OpenSlackTest extends TestCase
{
    public function testSettingTeamId()
    {
        $teamId = 'T12345';
        
        $OpenSlack = new OpenSlack();
        $return = $OpenSlack->setTeamId($teamId);
        
        $this->assertEquals($return, $OpenSlack);
        
        $refOpenSlack = new ReflectionClass($OpenSlack);
        $refTeamId = $refOpenSlack->getProperty('teamId');
        $refTeamId->setAccessible(true);
        $this->assertEquals($teamId, $refTeamId->getValue($OpenSlack));
    }
    
    public function testInvalidTeamId()
    {
        $this->expectException(DeepLinkException::class, '', DeepLinkException::NOT_SCALAR);
        
        $OpenSlack = new OpenSlack();
        $OpenSlack->setTeamId([]);
    }
    
    public function testGetQueryParameters()
    {
        $teamId = 'T12345';
        
        $OpenSlack = new OpenSlack();
        $this->assertEquals([], $OpenSlack->getQueryParameters());
        
        $OpenSlack = new OpenSlack();
        $OpenSlack
            ->setTeamId($teamId)
        ;
        $this->assertEquals([ 'team' => $teamId ], $OpenSlack->getQueryParameters());
    }
    
    /**
     * @depends testGetQueryParameters
     */
    public function testGetQueryUrl()
    {
        $OpenSlack = new OpenSlack();
        $queryString = 'slack://open';
        $this->assertEquals($queryString, $OpenSlack->createURL());
        
        $teamId = 'T98765';
        $OpenSlack = new OpenSlack();
        $OpenSlack->setTeamId($teamId);
        
        $queryString = 'slack://open?team=T98765';
        
        $this->assertEquals($queryString, $OpenSlack->createURL());
    }
}