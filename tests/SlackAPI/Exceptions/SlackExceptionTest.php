<?php

namespace SlackPHP\Tests\SlackAPI\Exceptions;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Exception\TransferException;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Zxurian
 * @covers SlackException
 */
class SlackExceptionTest extends TestCase
{
    public function testSettingGuzzleException()
    {
        $guzzleException = new TransferException();
        
        $slackException = new SlackException();
        $return = $slackException->setGuzzleException($guzzleException);
        $this->assertSame($slackException, $return);
        
        $refSlackException= new \ReflectionObject($slackException);
        $guzzleExceptionProperty = $refSlackException->getProperty('guzzleException');
        $guzzleExceptionProperty->setAccessible(true);
        
        $this->assertSame($guzzleException, $guzzleExceptionProperty->getValue($slackException));
    }
    
    public function testGettingGuzzleException()
    {
        $guzzleException = new TransferException();
        
        $slackException = new SlackException();
        $refSlackException = new \ReflectionObject($slackException);
        $propertyException = $refSlackException->getProperty('guzzleException');
        $propertyException->setAccessible(true);
        $propertyException->setValue($slackException, $guzzleException);
        
        $this->assertSame($guzzleException, $slackException->getGuzzleException());
    }
}