<?php

namespace Tests\SlackAPI\Models\Payloads;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\Payloads\ChatPostMessage;
use SlackPHP\SlackAPI\Models\Attachment;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ChatPostMessage
 */
class ChatPostMessageTest extends TestCase
{
    private $dummyString = 'string';
    
    private $dummyBool = true;
    
    /**
     * Test for setting channel
     */
    public function testSettingChannel()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setChannel($this->dummyString);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $channelProperty = $refChatPostMessageObject->getProperty('channel');
        $channelProperty->setAccessible(true);
        
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyString, $channelProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid channel
     */
    public function testSettingInvalidChannel()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setChannel(new \stdClass());
    }
    
    /**
     * Test for getting channel
     */
    public function testGetChannel()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $channelProperty = $refChatPostMessageObject->getProperty('channel');
        $channelProperty->setAccessible(true);
        $channelProperty->setValue($chatPostMessageObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $chatPostMessageObject->getChannel());
    }
    
    /**
     * Test for setting text
     */
    public function testSettingText()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setText($this->dummyString);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $textProperty = $refChatPostMessageObject->getProperty('text');
        $textProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyString, $textProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid text
     */
    public function testSettingInvalidText()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setText(new \stdClass());
    }
    
    /**
     * Test for getting text
     */
    public function testGetText()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $textProperty = $refChatPostMessageObject->getProperty('text');
        $textProperty->setAccessible(true);
        $textProperty->setValue($chatPostMessageObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $chatPostMessageObject->getText());
    }
    
    /**
     * Test for setting parse
     */
    public function testSettingParse()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setParse($this->dummyString);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $parseProperty = $refChatPostMessageObject->getProperty('parse');
        $parseProperty->setAccessible(true);
        
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyString, $parseProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid parse
     */
    public function testSettingInvalidParse()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setParse(new \stdClass());
    }
    
    /**
     * Test for getting parse
     */
    public function testGetParse()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $parseProperty = $refChatPostMessageObject->getProperty('parse');
        $parseProperty->setAccessible(true);
        $parseProperty->setValue($chatPostMessageObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $chatPostMessageObject->getParse());
    }
    
    /**
     * Test for setting link names
     */
    public function testSettingLinkNames()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setLinkNames($this->dummyBool);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $linkNamesProperty = $refChatPostMessageObject->getProperty('linkNames');
        $linkNamesProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $linkNamesProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid link names
     */
    public function testSettingInvalidLinkNames()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_BOOLEAN);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setLinkNames(new \stdClass());
    }
    
    /**
     * Test for getting link names
     */
    public function testGetLinkNames()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $linkNamesProperty = $refChatPostMessageObject->getProperty('linkNames');
        $linkNamesProperty->setAccessible(true);
        $linkNamesProperty->setValue($chatPostMessageObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $chatPostMessageObject->getLinkNames());
    }
    
    /**
     * Test for adding Attachment
     */
    public function testAddingAttachment()
    {
        $attachmentObject = new Attachment();
        $attachmentObject->setFallback($this->dummyString);
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->addAttachment($attachmentObject);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $attachmentsProperty = $refChatPostMessageObject->getProperty('attachments');
        $attachmentsProperty->setAccessible(true);
    
        $this->assertInstanceOf(Attachment::class, $attachmentsProperty->getValue($chatPostMessageObject)[0]);
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertInternalType('array', $attachmentsProperty->getValue($chatPostMessageObject));
        $this->assertEquals(1, count($attachmentsProperty->getValue($chatPostMessageObject)));
    }
    
    /**
     * Test for getting attachments
     */
    public function testGetAttachments()
    {
        $attachmentObject = new Attachment();
        $attachmentObject->setFallback($this->dummyString);
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $attachmentsProperty = $refChatPostMessageObject->getProperty('attachments');
        $attachmentsProperty->setAccessible(true);
        $attachmentsProperty->setValue($chatPostMessageObject, [$attachmentObject]);
        
        $this->assertInternalType('array', $chatPostMessageObject->getAttachments());
        $this->assertEquals(1, count($chatPostMessageObject->getAttachments()));
        $this->assertInstanceOf(Attachment::class, $chatPostMessageObject->getAttachments()[0]);
    }
    
    /**
     * Test for setting unfurlLinks
     */
    public function testSettingUnfurlLinks()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setUnfurlLinks($this->dummyBool);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $unfurlLinksProperty = $refChatPostMessageObject->getProperty('unfurlLinks');
        $unfurlLinksProperty->setAccessible(true);
        
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $unfurlLinksProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid unfurlLinks
     */
    public function testSettingInvalidUnfurlLinks()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_BOOLEAN);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setUnfurlLinks(new \stdClass());
    }
    
    /**
     * Test for getting unfurlLinks
     */
    public function testGetUnfurlLinks()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $unfurlLinksProperty = $refChatPostMessageObject->getProperty('unfurlLinks');
        $unfurlLinksProperty->setAccessible(true);
        $unfurlLinksProperty->setValue($chatPostMessageObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $chatPostMessageObject->getUnfurlLinks());
    }
    
    /**
     * Test for setting unfurlMedia
     */
    public function testSettingUnfurlMedia()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setUnfurlMedia($this->dummyBool);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $unfurlMediaProperty = $refChatPostMessageObject->getProperty('unfurlMedia');
        $unfurlMediaProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $unfurlMediaProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid unfurlMedia
     */
    public function testSettingInvalidUnfurlMedia()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_BOOLEAN);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setUnfurlMedia(new \stdClass());
    }
    
    /**
     * Test for getting unfurlMedia
     */
    public function testGetUnfurlMedia()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $unfurlMediaProperty = $refChatPostMessageObject->getProperty('unfurlMedia');
        $unfurlMediaProperty->setAccessible(true);
        $unfurlMediaProperty->setValue($chatPostMessageObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $chatPostMessageObject->getUnfurlMedia());
    }
    
    /**
     * Test for setting username
     */
    public function testSettingUsername()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setUsername($this->dummyString);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $usernameProperty = $refChatPostMessageObject->getProperty('username');
        $usernameProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyString, $usernameProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid username
     */
    public function testSettingInvalidUsername()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setUsername(new \stdClass());
    }
    
    /**
     * Test for getting username
     */
    public function testGetUsername()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $usernameProperty = $refChatPostMessageObject->getProperty('username');
        $usernameProperty->setAccessible(true);
        $usernameProperty->setValue($chatPostMessageObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $chatPostMessageObject->getUsername());
    }
    
    /**
     * Test for setting asUser
     */
    public function testSettingAsUser()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setAsUser($this->dummyBool);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $asUserProperty = $refChatPostMessageObject->getProperty('asUser');
        $asUserProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $asUserProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid asUser
     */
    public function testSettingInvalidAsUser()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_BOOLEAN);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setAsUser(new \stdClass());
    }
    
    /**
     * Test for getting asUser
     */
    public function testGetAsUser()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $asUserProperty = $refChatPostMessageObject->getProperty('asUser');
        $asUserProperty->setAccessible(true);
        $asUserProperty->setValue($chatPostMessageObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $chatPostMessageObject->getAsUser());
    }
    
    /**
     * Test for setting iconUrl
     */
    public function testSettingIconUrl()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setIconUrl($this->dummyString);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $iconUrlProperty = $refChatPostMessageObject->getProperty('iconUrl');
        $iconUrlProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyString, $iconUrlProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid iconUrl
     */
    public function testSettingInvalidIconUrl()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setIconUrl(new \stdClass());
    }
    
    /**
     * Test for getting iconUrl
     */
    public function testGetIconUrl()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $iconUrlProperty = $refChatPostMessageObject->getProperty('iconUrl');
        $iconUrlProperty->setAccessible(true);
        $iconUrlProperty->setValue($chatPostMessageObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $chatPostMessageObject->getIconUrl());
    }
    
    /**
     * Test for setting iconEmoji
     */
    public function testSettingIconEmoji()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setIconEmoji($this->dummyString);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $iconEmojiProperty = $refChatPostMessageObject->getProperty('iconEmoji');
        $iconEmojiProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals(':'.$this->dummyString.':', $iconEmojiProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid iconEmoji
     */
    public function testSettingInvalidIconEmoji()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setIconEmoji(new \stdClass());
    }
    
    /**
     * Test for getting iconEmoji
     */
    public function testGetIconEmoji()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $iconEmojiProperty = $refChatPostMessageObject->getProperty('iconEmoji');
        $iconEmojiProperty->setAccessible(true);
        $iconEmojiProperty->setValue($chatPostMessageObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $chatPostMessageObject->getIconEmoji());
    }
    
    /**
     * Test for setting threadTs
     */
    public function testSettingThreadTs()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setThreadTs($this->dummyString);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $threadTsProperty = $refChatPostMessageObject->getProperty('threadTs');
        $threadTsProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyString, $threadTsProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid threadTs
     */
    public function testSettingInvalidThreadTs()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setThreadTs(new \stdClass());
    }
    
    /**
     * Test for getting threadTs
     */
    public function testGetThreadTs()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $threadTsProperty = $refChatPostMessageObject->getProperty('threadTs');
        $threadTsProperty->setAccessible(true);
        $threadTsProperty->setValue($chatPostMessageObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $chatPostMessageObject->getThreadTs());
    }
    
    /**
     * Test for setting replyBroadcast
     */
    public function testSettingReplyBroadcast()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setReplyBroadcast($this->dummyBool);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $replyBroadcastProperty = $refChatPostMessageObject->getProperty('replyBroadcast');
        $replyBroadcastProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $replyBroadcastProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid replyBroadcast
     */
    public function testSettingInvalidReplyBroadcast()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_BOOLEAN);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setReplyBroadcast(new \stdClass());
    }
    
    /**
     * Test for getting replyBroadcast
     */
    public function testGetReplyBroadcast()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $replyBroadcastProperty = $refChatPostMessageObject->getProperty('replyBroadcast');
        $replyBroadcastProperty->setAccessible(true);
        $replyBroadcastProperty->setValue($chatPostMessageObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $chatPostMessageObject->getReplyBroadcast());
    }
    
    /**
     * Test for setting mrkdwn
     */
    public function testSettingMrkdwn()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $returnedObject = $chatPostMessageObject->setMrkdwn($this->dummyBool);
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $mrkdwnProperty = $refChatPostMessageObject->getProperty('mrkdwn');
        $mrkdwnProperty->setAccessible(true);
    
        $this->assertInstanceOf(ChatPostMessage::class, $returnedObject);
        $this->assertEquals($this->dummyBool, $mrkdwnProperty->getValue($chatPostMessageObject));
    }
    
    /**
     * Test for setting invalid mrkdwn
     */
    public function testSettingInvalidMrkdwn()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_BOOLEAN);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setMrkdwn(new \stdClass());
    }
    
    /**
     * Test for getting mrkdwn
     */
    public function testGetMrkdwn()
    {
        $chatPostMessageObject = new ChatPostMessage();
        $refChatPostMessageObject = new \ReflectionObject($chatPostMessageObject);
        $mrkdwnProperty = $refChatPostMessageObject->getProperty('mrkdwn');
        $mrkdwnProperty->setAccessible(true);
        $mrkdwnProperty->setValue($chatPostMessageObject, $this->dummyBool);
    
        $this->assertEquals($this->dummyBool, $chatPostMessageObject->getMrkdwn());
    }
    
    /**
     * Test that exception is thrown if required channel property is not set
     */
    public function testValidateRequiredChannel()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setText($this->dummyString);
        $chatPostMessageObject->validateRequired();
    }
    
    /**
     * Test that exception is thrown if both text and attachments property are not set
     */
    public function testValidateRequiredTextOrAttachments()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $chatPostMessageObject = new ChatPostMessage();
        $chatPostMessageObject->setChannel($this->dummyString);
        $chatPostMessageObject->validateRequired();
    }
    
    /**
     * Test for getting response class
     */
    public function testGetResponseClass()
    {
        $chatPostMessageObject = new ChatPostMessage();
    
        $this->assertEquals(get_class($chatPostMessageObject).'Response', $chatPostMessageObject->getResponseClass());
    }
    
    /**
     * Test for getting API method
     */
    public function testGetMethod()
    {
        $chatPostMessageObject = new ChatPostMessage();
    
        $this->assertEquals('chat.postMessage', $chatPostMessageObject->getMethod());
    }
}