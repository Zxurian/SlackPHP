<?php

namespace Tests\SlackAPI\Models;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\AttachmentAction;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers AttachmentAction
 */
class AttachmentActionTest extends TestCase
{
    private $dummyString = 'string';
    
    /**
     * Testing setter of name
     */
    public function testSettingName()
    {
        $attachmentActionObject = new AttachmentAction();
        $attachmentActionObject->setName($this->dummyString);
        $refAttachmentActionObject = new \ReflectionObject($attachmentActionObject);
        $nameProperty = $refAttachmentActionObject->getProperty('name');
        $nameProperty->setAccessible(true);
    
        $this->assertEquals($this->dummyString, $nameProperty->getValue($attachmentActionObject));
    }
    
    /**
     * Test setting invalid name
     */
    public function testSettingInvalidName()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $nameProperty = new AttachmentAction();
        $nameProperty->setName(new \stdClass());
    }
    
    /**
     * Test getting name
     */
    public function testGetName()
    {
        $attachmentActionObject = new AttachmentAction();
        $refAttachmentActionObject = new \ReflectionObject($attachmentActionObject);
        $nameProperty = $refAttachmentActionObject->getProperty('name');
        $nameProperty->setAccessible(true);
        $nameProperty->setValue($attachmentActionObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $attachmentActionObject->getName());
    }
    
    /**
     * Test setting text
     */
    public function testSettingText()
    {
        $attachmentActionObject = new AttachmentAction();
        $attachmentActionObject->setText($this->dummyString);
        $refAttachmentActionObject = new \ReflectionObject($attachmentActionObject);
        $textProperty = $refAttachmentActionObject->getProperty('text');
        $textProperty->setAccessible(true);
        
        $this->assertEquals($this->dummyString, $textProperty->getValue($attachmentActionObject));
    }
    
    /**
     * Test setting invalid text
     */
    public function testSettingInvalidText()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $textProperty = new AttachmentAction();
        $textProperty->setText(new \stdClass());
    }
    
    /**
     * Test getting text
     */
    public function testGetText()
    {
        $attachmentActionObject = new AttachmentAction();
        $refAttachmentActionObject = new \ReflectionObject($attachmentActionObject);
        $textProperty = $refAttachmentActionObject->getProperty('text');
        $textProperty->setAccessible(true);
        $textProperty->setValue($attachmentActionObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $attachmentActionObject->getText());
    }
    
    /**
     * Test setting style
     */
    public function testSettingStyle()
    {
        $attachmentActionObject = new AttachmentAction();
        $attachmentActionObject->setStyle($this->dummyString);
        $refAttachmentActionObject = new \ReflectionObject($attachmentActionObject);
        $styleProperty = $refAttachmentActionObject->getProperty('style');
        $styleProperty->setAccessible(true);
        
        $this->assertEquals($this->dummyString, $styleProperty->getValue($attachmentActionObject));
    }
    
    /**
     * Test setting invalid style
     */
    public function testSettingInvalidStyle()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $styleProperty = new AttachmentAction();
        $styleProperty->setStyle(new \stdClass());
    }
    
    /**
     * Test for getting style
     */
    public function testGetStyle()
    {
        $attachmentActionObject = new AttachmentAction();
        $refAttachmentActionObject = new \ReflectionObject($attachmentActionObject);
        $styleProperty = $refAttachmentActionObject->getProperty('style');
        $styleProperty->setAccessible(true);
        $styleProperty->setValue($attachmentActionObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentActionObject->getStyle());
    }
}