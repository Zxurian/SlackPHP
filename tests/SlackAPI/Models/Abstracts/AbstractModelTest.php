<?php

namespace SlackPHP\Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use SlackPHP\SlackAPI\Models\Methods\ChatPostMessage;
use SlackPHP\SlackAPI\Models\MessageParts\Attachment;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers AbstractModel
 */
class AbstractModelTest extends TestCase
{
    private $dummyString = 'string';
    
    /**
     * Test that no exceptions is thrown, if all the required fields are set
     */
    public function testValidateRequired()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $stub->validateRequired($stub);
        
        $this->assertTrue(true);
    }
    
    /**
     * Test that no exceptions are thrown, if Model contains othe models in properties
     */
    public function testvalidateRequiredModelWithModelInProperties()
    {
        $attachment = new Attachment();
        $attachment->setFallback($this->dummyString);
        $chatPostMessage = new ChatPostMessage();
        $chatPostMessage->addAttachment($attachment);
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        $stub->validateRequired($chatPostMessage);
        $this->assertTrue(true);
    }
    
    /**
     * Test ways of getting links
     */
    public function testGetLink()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $link = '#1234';
        $display = 'mylink';
        
        $this->assertEquals(AbstractModel::LEFT_ANGLE_PLACEHOLDER.$link.AbstractModel::RIGHT_ANGLE_PLACEHOLDER, $stub->getLink($link));
        $this->assertEquals(AbstractModel::LEFT_ANGLE_PLACEHOLDER.$link.'|'.$display.AbstractModel::RIGHT_ANGLE_PLACEHOLDER, $stub->getLink($link, $display));
    }
    
    /**
     * Test an exception is thrown when providing a non scalar value to bad link
     */
    public function testGetLinkExceptionBadLink()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $this->expectException(\InvalidArgumentException::class);
        $stub->getLink(null);
    }
    
    /**
     * Test an exception is thrown when providing a non scalar value to display
     */
    public function testGetLinkExceptionBadDisplay()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $this->expectException(\InvalidArgumentException::class);
        $stub->getLink('test', new \stdClass());
    }
    
    /**
     * Test getFormatDate returns correct string if link is scalar
     */
    public function testGetFormatedLinkScalar()
    {   
        $timestamp = 1497446779;
        $datetime = new \DateTime();
        $datetime->setTimestamp($timestamp);
        $expectedReturn = '|||LEFT_ANGLE|||!date^'.$timestamp.'^string^string|string|||RIGHT_ANGLE|||';
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $return = $stub->getFormatedDate($datetime, $this->dummyString, $this->dummyString, $this->dummyString);
        $this->assertEquals($expectedReturn, $return);
    }
    
    /**
     * Test that exception is thrown if fllback is not scalar
     */
    public function testGetFormatedDateNotScalarFallback()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $this->expectException(\InvalidArgumentException::class);
        $stub->getFormatedDate(new \DateTime(), null);
    }
    
    /**
     * Test that exception is thrown in getFormatedDate method if stringContainingDateTokens parameter is not scalar
     */
    public function testGetFormatedDateStringContainingDateTokensNotScalar()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $this->expectException(\InvalidArgumentException::class);
        $stub->getFormatedDate(new \DateTime(), $this->dummyString, null);
    }

    /**
     * Test that exception is thrown in getFormatedDate method if links parameter is not scalar
     */
    public function testGetFormatedDateLinkNotScalar()
    {
        $datetime = new \DateTime();
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $this->expectException(\InvalidArgumentException::class);
        $stub->getFormatedDate($datetime, $this->dummyString, $this->dummyString, $datetime);
    }
    
    /**
     * Test that correct string returned from getFormatedDate method, if link is null(not provided)
     */
    public function testGetFormatedDateLinkDefaultNull()
    {
        $timestamp = 1497446779;
        $datetime = new \DateTime();
        $datetime->setTimestamp($timestamp);
        $expectedString = AbstractModel::LEFT_ANGLE_PLACEHOLDER.'!date^'.$timestamp.'^string|string'.AbstractModel::RIGHT_ANGLE_PLACEHOLDER;
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $return = $stub->getFormatedDate($datetime, $this->dummyString, $this->dummyString);
        $this->assertEquals($expectedString, $return);
        
    }
}