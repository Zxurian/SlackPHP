<?php

use PHPUnit\Framework\TestCase;
use SlackPHP\DeepLink\OpenFile;
use SlackPHP\DeepLink\Exceptions\DeepLinkException;

/**
 * @author zxurian
 * @covers OpenFile
 */
final class OpenFileTest extends TestCase
{
    public function testSettingTeamId()
    {
        $teamId = 'T12345';
        
        $OpenFile = new OpenFile();
        $return = $OpenFile->setTeamId($teamId);
        
        $this->assertEquals($return, $OpenFile);
        
        $refOpenFile = new ReflectionClass($OpenFile);
        $refTeamId = $refOpenFile->getProperty('teamId');
        $refTeamId->setAccessible(true);
        $this->assertEquals($teamId, $refTeamId->getValue($OpenFile));
    }
    
    public function testSettingFileId()
    {
        $fileId = 'F12345';
        
        $OpenFile = new OpenFile();
        $return = $OpenFile->setFileId($fileId);
        
        $this->assertEquals($return, $OpenFile);
        
        $refOpenFile = new ReflectionClass($OpenFile);
        $refTeamId = $refOpenFile->getProperty('fileId');
        $refTeamId->setAccessible(true);
        $this->assertEquals($fileId, $refTeamId->getValue($OpenFile));
    }
    
    public function testInvalidTeamId()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $OpenFile = new OpenFile();
        $OpenFile->setTeamId([]);
    }
    
    public function testInvalidFileId()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $OpenFile = new OpenFile();
        $OpenFile->setFileId([]);
    }
    
    public function testMissingFile()
    {
        $OpenFile = new OpenFile();
        $OpenFile->setTeamId('T12345');
        
        $this->expectException(DeepLinkException::class, '', DeepLinkException::FILE_ID_NOT_SET);
        $OpenFile->getQueryParameters();
    }
    
    public function testMissingTeam()
    {
        $OpenFile = new OpenFile();
        $OpenFile->setFileId('F12345');
        
        $this->expectException(DeepLinkException::class, '', DeepLinkException::TEAM_ID_NOT_SET);
        $OpenFile->getQueryParameters();
    }
    
    /**
     * @depends testMissingFile
     * @depends testMissingTeam
     */
    public function testGetQueryParameters()
    {
        $teamId = 'T12345';
        $fileId = 'F67890';
        
        $OpenFile = new OpenFile();
        $OpenFile
            ->setTeamId($teamId)
            ->setFileId($fileId)
        ;
        
        $this->assertEquals([ 'team' => $teamId, 'id' => $fileId], $OpenFile->getQueryParameters());
    }
    
    /**
     * @depends testGetQueryParameters
     */
    public function testGetQueryUrl()
    {
        $teamId = 'T98765';
        $fileId = 'F43210';
        
        $OpenFile = new OpenFile();
        $OpenFile
            ->setTeamId($teamId)
            ->setFileId($fileId)
        ;
        
        $queryString = 'slack://file?team=T98765&id=F43210';
        
        $this->assertEquals($queryString, $OpenFile->createURL());
        
    }
}