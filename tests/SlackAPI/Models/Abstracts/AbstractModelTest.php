<?php

namespace SlackPHP\Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Abstracts\AbstractModel;
use SlackPHP\SlackAPI\Models\Methods\ChatPostMessage;
use SlackPHP\SlackAPI\Models\MessageParts\Attachment;
use SlackPHP\SlackAPI\Enumerators\SpecialCommand;

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
        
        $link = 'http://1234';
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
        $stub->getLink('http://1234', new \stdClass());
    }
    
    /**
     * Test getFormattedDate returns correct string if link is scalar
     */
    public function testGetFormattedLinkScalar()
    {   
        $timestamp = 1497446779;
        $datetime = new \DateTime();
        $datetime->setTimestamp($timestamp);
        $expectedReturn = '|||LEFT_ANGLE|||!date^'.$timestamp.'^string^string|string|||RIGHT_ANGLE|||';
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $return = $stub->getFormattedDate($datetime, $this->dummyString, $this->dummyString, $this->dummyString);
        $this->assertEquals($expectedReturn, $return);
    }
    
    /**
     * Test that exception is thrown if fallback is not scalar
     */
    public function testGetFormattedDateNotScalarFallback()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $this->expectException(\InvalidArgumentException::class);
        $stub->getFormattedDate(new \DateTime(), $this->dummyString, null);
    }
    
    /**
     * Test that exception is thrown in getFormattedDate method if stringContainingDateTokens parameter is not scalar
     */
    public function testgetFormattedDateStringContainingDateTokensNotScalar()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $this->expectException(\InvalidArgumentException::class);
        $stub->getFormattedDate(new \DateTime(), null, $this->dummyString);
    }

    /**
     * Test that exception is thrown in getFormattedDate method if links parameter is not scalar
     */
    public function testGetFormattedDateLinkNotScalar()
    {
        $datetime = new \DateTime();
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $this->expectException(\InvalidArgumentException::class);
        $stub->getFormattedDate($datetime, $this->dummyString, $this->dummyString, $datetime);
    }
    
    /**
     * Test that correct string returned from getFormattedDate method, if link is null(not provided)
     */
    public function testGetFormattedDateLinkDefaultNull()
    {
        $timestamp = 1497446779;
        $datetime = new \DateTime();
        $datetime->setTimestamp($timestamp);
        $expectedString = AbstractModel::LEFT_ANGLE_PLACEHOLDER.'!date^'.$timestamp.'^string|string'.AbstractModel::RIGHT_ANGLE_PLACEHOLDER;
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $return = $stub->getFormattedDate($datetime, $this->dummyString, $this->dummyString);
        $this->assertEquals($expectedString, $return);
        
    }
    
    /**
     * Test that correct string is returned on subteam special command
     */
    public function testGetVariableWithSubteam()
    {
        $expectedString = AbstractModel::LEFT_ANGLE_PLACEHOLDER.'!subteam^'.$this->dummyString.'|'.$this->dummyString.AbstractModel::RIGHT_ANGLE_PLACEHOLDER;
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        
        $return = $stub->getVariable(SpecialCommand::SUBTEAM(), null, $this->dummyString, $this->dummyString);
        $this->assertEquals($expectedString, $return);
    }
    
    /**
     * Test that exception is thrown if special command is not scalar and not null
     */
    public function testGetVariableLabelNotScalar()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        $this->expectException(\InvalidArgumentException::class);
        $stub->getVariable(SpecialCommand::CHANNEL(), []);
    }
    
    /**
     * Test that exception is thrown if id not provided with subteam
     */
    public function testGetVariableIdNotSetWithSubteam()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        $this->expectException(\InvalidArgumentException::class);
        $stub->getVariable(SpecialCommand::SUBTEAM(), null, null, $this->dummyString);
    }
    
    /**
     * Test that exception is thrown if handle is not set for subteam
     */
    public function testGetVariableHandleNotSetWithSubteam()
    {
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        $this->expectException(\InvalidArgumentException::class);
        $stub->getVariable(SpecialCommand::SUBTEAM(), null, $this->dummyString);
    }
    
    /**
     * Test that corrent string is returned with here variable if label is not provided
     */
    public function testGetVariableHereWithLabelNotProvided()
    {
        $expectedString = AbstractModel::LEFT_ANGLE_PLACEHOLDER.'!'.SpecialCommand::HERE.'|'.SpecialCommand::HERE.AbstractModel::RIGHT_ANGLE_PLACEHOLDER;
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        $return = $stub->getVariable(SpecialCommand::HERE());
        $this->assertEquals($expectedString, $return);
    }
    
    /**
     * Test that correct string is returned if label is not provided to one of regular special command
     */
    public function testGetVariableChannelWithNoLabel()
    {
        $expectedString = AbstractModel::LEFT_ANGLE_PLACEHOLDER.'!'.SpecialCommand::CHANNEL.AbstractModel::RIGHT_ANGLE_PLACEHOLDER;
        $stub = $this->getMockForAbstractClass(AbstractModel::class);
        $return = $stub->getVariable(SpecialCommand::CHANNEL());
        $this->assertEquals($expectedString, $return);
    }
}