<?php

namespace SlackPHP\Tests\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Models\MessageParts\Message;
use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\MessageParts\Attachment;
use SlackPHP\SlackAPI\Enumerators\ResponseType;

/**
 * @author Zxurian
 * @covers Message
 */
class MessageTest extends TestCase
{
    public function testSettingText()
    {
        $text = 'testing';
        
        $message = new Message();
        $retObject = $message->setText($text);
        $this->assertInstanceOf(Message::class, $retObject);
        
        $refMessage = new \ReflectionObject($message);
        $textProperty = $refMessage->getProperty('text');
        $textProperty->setAccessible(true);
        
        $this->assertEquals($text, $textProperty->getValue($message));
    }
    
    public function testSettingInvalidText()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $message = new Message();
        $message->setText(null);
    }
    
    public function testGettingText()
    {
        $text = 'testing';
        
        $message = new Message();
        $refMessage = new \ReflectionObject($message);
        $textProperty = $refMessage->getProperty('text');
        $textProperty->setAccessible(true);
        $textProperty->setValue($message, $text);
        
        $this->assertEquals($text, $message->getText());
    }

    public function testSettingChannel()
    {
        $text = 'testing';
        
        $message = new Message();
        $retObject = $message->setChannel($text);
        $this->assertInstanceOf(Message::class, $retObject);
        
        $refMessage = new \ReflectionObject($message);
        $channelProperty = $refMessage->getProperty('channel');
        $channelProperty->setAccessible(true);
        
        $this->assertEquals($text, $channelProperty->getValue($message));
    }
    
    public function testSettingInvalidChannel()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $message = new Message();
        $message->setChannel(null);
    }
    
    public function testGettingChannel()
    {
        $text = 'testing';
        
        $message = new Message();
        $refMessage = new \ReflectionObject($message);
        $channelProperty = $refMessage->getProperty('channel');
        $channelProperty->setAccessible(true);
        $channelProperty->setValue($message, $text);
        
        $this->assertEquals($text, $message->getChannel());
    }
    
    public function testAddingAttachments()
    {
        $attachment = new Attachment();
        
        $message = new Message();
        $retObject = $message->addAttachment($attachment);
        $this->assertInstanceOf(Message::class, $retObject);
        
        $refMessage = new \ReflectionObject($message);
        $attachmentsProperty= $refMessage->getProperty('attachments');
        $attachmentsProperty->setAccessible(true);
        
        $this->assertEquals([ $attachment ], $attachmentsProperty->getValue($message));
    }
    
    public function testGettingAttachments()
    {
        $attachment = new Attachment();

        $message = new Message();
        $refMessage = new \ReflectionObject($message);
        $attachmentsProperty= $refMessage->getProperty('attachments');
        $attachmentsProperty->setAccessible(true);
        $attachmentsProperty->setValue($message, [ $attachment ]);
        
        $this->assertEquals([ $attachment ], $message->getAttachments());
    }
    
    public function testSettingThreadTs()
    {
        $text = 'testing';
        
        $message = new Message();
        $retObject = $message->setThreadTs($text);
        $this->assertInstanceOf(Message::class, $retObject);
        
        $refMessage = new \ReflectionObject($message);
        $threadTsProperty = $refMessage->getProperty('threadTs');
        $threadTsProperty->setAccessible(true);
        
        $this->assertEquals($text, $threadTsProperty->getValue($message));
    }
    
    public function testSettingInvalidThreadTs()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $message = new Message();
        $message->setThreadTs(null);
    }
    
    public function testGettingThreadTs()
    {
        $text = 'testing';
        
        $message = new Message();
        $refMessage = new \ReflectionObject($message);
        $threadTsProperty = $refMessage->getProperty('threadTs');
        $threadTsProperty->setAccessible(true);
        $threadTsProperty->setValue($message, $text);
        
        $this->assertEquals($text, $message->getThreadTs());
    }
    
    public function testSettingResponseType()
    {
        $message = new Message();
        $retObject = $message->setResponseType(ResponseType::IN_CHANNEL());
        $this->assertInstanceOf(Message::class, $retObject);
        
        $refMessage = new \ReflectionObject($message);
        $responseTypeProperty = $refMessage->getProperty('responseType');
        $responseTypeProperty->setAccessible(true);
        
        $this->assertEquals(ResponseType::IN_CHANNEL(), $responseTypeProperty->getValue($message));
    }
    
    public function testGettingResponseType()
    {
        $text = 'testing';
        
        $message = new Message();
        $refMessage = new \ReflectionObject($message);
        $responseTypeProperty = $refMessage->getProperty('threadTs');
        $responseTypeProperty->setAccessible(true);
        $responseTypeProperty->setValue($message, ResponseType::IN_CHANNEL());
        
        $this->assertEquals(ResponseType::IN_CHANNEL(), $message->getThreadTs());
    }
    
    public function testSettingReplaceOriginal()
    {
        $value = true;
        
        $message = new Message();
        $retObject = $message->setReplaceOriginal($value);
        $this->assertInstanceOf(Message::class, $retObject);
        
        $refMessage = new \ReflectionObject($message);
        $replaceOriginal = $refMessage->getProperty('replaceOriginal');
        $replaceOriginal->setAccessible(true);
        
        $this->assertEquals($value, $replaceOriginal->getValue($message));
    }
    
    public function testSettingInvalidReplaceOriginal()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $message = new Message();
        $message->setReplaceOriginal(null);
    }
    
    public function testGettingReplaceOriginal()
    {
        $value= true;
        
        $message = new Message();
        $refMessage = new \ReflectionObject($message);
        $replaceOriginal= $refMessage->getProperty('replaceOriginal');
        $replaceOriginal->setAccessible(true);
        $replaceOriginal->setValue($message, $value);
        
        $this->assertEquals($value, $message->getReplaceOriginal());
    }
    
    public function testSettingDeleteOriginal()
    {
        $value = true;
        
        $message = new Message();
        $retObject = $message->setDeleteOriginal($value);
        $this->assertInstanceOf(Message::class, $retObject);
        
        $refMessage = new \ReflectionObject($message);
        $deleteOriginal = $refMessage->getProperty('deleteOriginal');
        $deleteOriginal->setAccessible(true);
        
        $this->assertEquals($value, $deleteOriginal->getValue($message));
    }
    
    public function testSettingInvalidDeleteOriginal()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $message = new Message();
        $message->setDeleteOriginal(null);
    }
    
    public function testGettingDeleteOriginal()
    {
        $value= true;
        
        $message = new Message();
        $refMessage = new \ReflectionObject($message);
        $deleteOriginal= $refMessage->getProperty('deleteOriginal');
        $deleteOriginal->setAccessible(true);
        $deleteOriginal->setValue($message, $value);
        
        $this->assertEquals($value, $message->getDeleteOriginal());
    }
    
    /**
     * Test to see if validatModel method can be completed sucessfully
     */
    public function testSuccessfulValidateModel()
    {
        $text = 'testing';
        
        $message = new Message();
        $message->setText($text);
        $message->validateModel();
        
        $this->assertTrue(true);
    }
    
    /**
     * Test that exception is thrown if text and attachments not provided
     */
    public function testValidateModelNoTextAndAttachments()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $message = new Message();
        $message->validateModel();
    }
    
    /**
     * Test that exception is thrown if responseType is provided for new message
     */
    public function testResponseTypeWithoutThreadTs()
    {
        $text = 'testing';
        
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::INVALID_RESPONSE_TYPE);
        $message = new Message();
        $message
            ->setText($text)
            ->setResponseType(ResponseType::IN_CHANNEL())
        ;
        $message->validateModel();
    }
    
}