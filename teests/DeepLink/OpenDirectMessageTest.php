<?php

use PHPUnit\Framework\TestCase;
use SlackPHP\DeepLink\OpenDirectMessage;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * @author zxurian
 * @covers OpenDirectMessage
 */
final class OpenDirectMessageTest extends TestCase
{
    public function testSettingTeamId()
    {
        $teamId = 'T12345';
        
        $OpenDirectMessage = new OpenDirectMessage();
        $return = $OpenDirectMessage->setTeamId($teamId);
        
        $this->assertEquals($return, $OpenDirectMessage);
        
        $refOpenDirectMessage = new ReflectionClass($OpenDirectMessage);
        $refTeamId = $refOpenDirectMessage->getProperty('teamId');
        $refTeamId->setAccessible(true);
        $this->assertEquals($teamId, $refTeamId->getValue($OpenDirectMessage));
    }
    
    public function testSettingUserId()
    {
        $userId = 'U12345';
        
        $OpenDirectMessage = new OpenDirectMessage();
        $return = $OpenDirectMessage->setUserId($userId);
        
        $this->assertEquals($return, $OpenDirectMessage);
        
        $refOpenDirectMessage = new ReflectionClass($OpenDirectMessage);
        $refTeamId = $refOpenDirectMessage->getProperty('userId');
        $refTeamId->setAccessible(true);
        $this->assertEquals($userId, $refTeamId->getValue($OpenDirectMessage));
    }
    
    public function testInvalidTeamId()
    {
        $this->expectException(DeepLinkException::class, '', DeepLinkException::NOT_SCALAR);
        
        $OpenDirectMessage = new OpenDirectMessage();
        $OpenDirectMessage->setTeamId([]);
    }
    
    public function testInvalidUserId()
    {
        $this->expectException(DeepLinkException::class, '', DeepLinkException::NOT_SCALAR);
        
        $OpenDirectMessage = new OpenDirectMessage();
        $OpenDirectMessage->setUserId([]);
    }
    
    public function testMissingUser()
    {
        $OpenDirectMessage = new OpenDirectMessage();
        $OpenDirectMessage->setTeamId('T12345');
        
        $this->expectException(DeepLinkException::class, '', DeepLinkException::USER_ID_NOT_SET);
        $OpenDirectMessage->getQueryParameters();
    }
    
    public function testMissingTeam()
    {
        $OpenDirectMessage = new OpenDirectMessage();
        $OpenDirectMessage->setUserId('U12345');
        
        $this->expectException(DeepLinkException::class, '', DeepLinkException::TEAM_ID_NOT_SET);
        $OpenDirectMessage->getQueryParameters();
    }
    
    /**
     * @depends testMissingUser
     * @depends testMissingTeam
     */
    public function testGetQueryParameters()
    {
        $teamId = 'T12345';
        $userId = 'U67890';
        
        $OpenDirectMessage = new OpenDirectMessage();
        $OpenDirectMessage
            ->setTeamId($teamId)
            ->setUserId($userId)
        ;
        
            $this->assertEquals([ 'team' => $teamId, 'id' => $userId], $OpenDirectMessage->getQueryParameters());
    }
    
    /**
     * @depends testGetQueryParameters
     */
    public function testGetQueryUrl()
    {
        $teamId = 'T98765';
        $userId = 'U43210';

        $OpenDirectMessage = new OpenDirectMessage();
        $OpenDirectMessage
            ->setTeamId($teamId)
            ->setUserId($userId)
        ;
        
        $queryString = 'slack://user?team=T98765&id=U43210';
        
        $this->assertEquals($queryString, $OpenDirectMessage->createURL());
        
    }
}