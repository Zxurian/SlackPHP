<?php

namespace Tests\SlackAPI\Models\MessageParts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\MessageParts\AttachmentField;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers AttachmentField
 */
class AttachmentFieldTest extends TestCase
{
    private $dummyString = 'string';
    
    private $dummyBool = true;
    
    /**
     * Test for setting title
     */
    public function testSettingTitle()
    {
        $attachmentFieldObject = new AttachmentField();
        $returnedObject = $attachmentFieldObject->setTitle($this->dummyString);
        $refAttachmentFieldObject = new \ReflectionObject($attachmentFieldObject);
        $titleProperty = $refAttachmentFieldObject->getProperty('title');
        $titleProperty->setAccessible(true);
        
        $this->assertInstanceOf(AttachmentField::class, $returnedObject);
        $this->assertEquals($this->dummyString, $titleProperty->getValue($attachmentFieldObject));
    }
    
    /**
     * Test for setting invalid title
     */
    public function testSettingInvalidTitle()
    {
        $this->expectException(\InvalidArgumentException::class);
        $attachmentFieldObject = new AttachmentField();
        $attachmentFieldObject->setTitle(null);
    }
    
    /**
     * Test for getting title
     */
    public function testGetTitle()
    {
        $attachmentFieldObject = new AttachmentField();
        $refAttachmentFieldObject = new \ReflectionObject($attachmentFieldObject);
        $titleProperty = $refAttachmentFieldObject->getProperty('title');
        $titleProperty->setAccessible(true);
        $titleProperty->setValue($attachmentFieldObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentFieldObject->getTitle());
    }
    
    /**
     * Test for setting value
     */
    public function testSettingValue()
    {
        $attachmentFieldObject = new AttachmentField();
        $returnedObject = $attachmentFieldObject->setValue($this->dummyString);
        $refAttachmentFieldObject = new \ReflectionObject($attachmentFieldObject);
        $valueProperty = $refAttachmentFieldObject->getProperty('value');
        $valueProperty->setAccessible(true);
    
        $this->assertInstanceOf(AttachmentField::class, $returnedObject);
        $this->assertEquals($this->dummyString, $valueProperty->getValue($attachmentFieldObject));
    }
    
    /**
     * Test for setting invalid value
     */
    public function testSettingInvalidValue()
    {
        $this->expectException(\InvalidArgumentException::class);
        $attachmentFieldObject = new AttachmentField();
        $attachmentFieldObject->setValue(null);
    }
    
    /**
     * Test for getting value
     */
    public function testGetValue()
    {
        $attachmentFieldObject = new AttachmentField();
        $refAttachmentFieldObject = new \ReflectionObject($attachmentFieldObject);
        $valueProperty = $refAttachmentFieldObject->getProperty('value');
        $valueProperty->setAccessible(true);
        $valueProperty->setValue($attachmentFieldObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentFieldObject->getValue());
    }
    
    /**
     * Test for setting short
     */
    public function testSettingShort()
    {
        $attachmentFieldObject = new AttachmentField();
        $returnedObject = $attachmentFieldObject->setShort($this->dummyBool);
        $refAttachmentFieldObject = new \ReflectionObject($attachmentFieldObject);
        $shortProperty = $refAttachmentFieldObject->getProperty('short');
        $shortProperty->setAccessible(true);
    
        $this->assertInstanceOf(AttachmentField::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $shortProperty->getValue($attachmentFieldObject));
    }
    
    /**
     * Test for setting invalid short
     */
    public function testSettingInvalidShort()
    {
        $this->expectException(\InvalidArgumentException::class);
        $attachmentFieldObject = new AttachmentField();
        $attachmentFieldObject->setShort(null);
    }
    
    /**
     * Test for getting short
     */
    public function testGetShort()
    {
        $attachmentFieldObject = new AttachmentField();
        $refAttachmentFieldObject = new \ReflectionObject($attachmentFieldObject);
        $shortProperty = $refAttachmentFieldObject->getProperty('short');
        $shortProperty->setAccessible(true);
        $shortProperty->setValue($attachmentFieldObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentFieldObject->getShort());
    }
}