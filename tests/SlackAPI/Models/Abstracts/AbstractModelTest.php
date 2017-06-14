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
}