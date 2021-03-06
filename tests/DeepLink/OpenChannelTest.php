<?php

use PHPUnit\Framework\TestCase;
use SlackPHP\DeepLink\OpenChannel;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * @author Zxurian
 * @covers OpenChannel
 */
final class OpenChannelTest extends TestCase
{
    public function testSettingTeamId()
    {
        $teamId = 'T12345';
        
        $OpenChannel = new OpenChannel();
        $return = $OpenChannel->setTeamId($teamId);
        
        $this->assertEquals($return, $OpenChannel);
        
        $refOpenChannel = new ReflectionClass($OpenChannel);
        $refTeamId = $refOpenChannel->getProperty('teamId');
        $refTeamId->setAccessible(true);
        $this->assertEquals($teamId, $refTeamId->getValue($OpenChannel));
    }
    
    public function testSettingChannelId()
    {
        $channelId = 'C12345';
        
        $OpenChannel = new OpenChannel();
        $return = $OpenChannel->setChannelId($channelId);
        
        $this->assertEquals($return, $OpenChannel);
        
        $refOpenChannel = new ReflectionClass($OpenChannel);
        $refTeamId = $refOpenChannel->getProperty('channelId');
        $refTeamId->setAccessible(true);
        $this->assertEquals($channelId, $refTeamId->getValue($OpenChannel));
    }
    
    public function testInvalidTeamId()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $OpenChannel = new OpenChannel();
        $OpenChannel->setTeamId(null);
    }
    
    public function testInvalidChannelId()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $OpenChannel = new OpenChannel();
        $OpenChannel->setChannelId(null);
    }
    
    public function testMissingChannel()
    {
        $this->expectException(DeepLinkException::class);
        $this->expectExceptionCode(DeepLinkException::CHANNEL_ID_NOT_SET);
        
        $OpenChannel = new OpenChannel();
        $OpenChannel->setTeamId('T12345');
        
        $this->expectException(DeepLinkException::class, '', DeepLinkException::CHANNEL_ID_NOT_SET);
        $OpenChannel->getQueryParameters();
    }
    
    public function testMissingTeam()
    {
        $this->expectException(DeepLinkException::class);
        $this->expectExceptionCode(DeepLinkException::TEAM_ID_NOT_SET);
        
        $OpenChannel = new OpenChannel();
        $OpenChannel->setChannelId('C12345');
        
        $this->expectException(DeepLinkException::class, '', DeepLinkException::TEAM_ID_NOT_SET);
        $OpenChannel->getQueryParameters();
    }
    
    /**
     * @depends testMissingChannel
     * @depends testMissingTeam
     */
    public function testGetQueryParameters()
    {
        $teamId = 'T12345';
        $channelId = 'C67890';
        
        $OpenChannel = new OpenChannel();
        $OpenChannel
            ->setTeamId($teamId)
            ->setChannelId($channelId)
        ;
        
        $this->assertEquals([ 'team' => $teamId, 'id' => $channelId ], $OpenChannel->getQueryParameters());
    }
    
    /**
     * @depends testGetQueryParameters
     */
    public function testGetQueryUrl()
    {
        $teamId = 'T98765';
        $channelId = 'C43210';

        $OpenChannel = new OpenChannel();
        $OpenChannel
            ->setTeamId($teamId)
            ->setChannelId($channelId)
        ;
        
        $queryString = 'slack://channel?team=T98765&id=C43210';
        
        $this->assertEquals($queryString, $OpenChannel->createURL());
        
    }
}