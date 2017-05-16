<?php

namespace Tests\SlackAPI\Models;

use SlackPHP\SlackAPI\Models\Attachment;
use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\ActionOption;
use SlackPHP\SlackAPI\Models\AttachmentField;
use SlackPHP\SlackAPI\Models\AttachmentAction;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers Attachment
 */
class AttachmentTest extends TestCase
{
    private $dummyString = 'string';
    
    private $mrkdwnInArray = ["pretext", "fields"];
    
    /**
     * Test for setting fallback
     */
    public function testSettingFallback()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setFallback($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $fallbackProperty = $refAttachmentObject->getProperty('fallback');
        $fallbackProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $fallbackProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for setting invalid fallback
     */
    public function testSettingInvalidFallback()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setFallback(new \stdClass());
    }
    
    /**
     * Testing get fallback
     */
    public function testGetFallback()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $fallbackProperty = $refAttachmentObject->getProperty('fallback');
        $fallbackProperty->setAccessible(true);
        $fallbackProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getFallback());
    }
    
    /**
     * Test for setting color
     */
    public function testSettingColor()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setColor($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $colorProperty = $refAttachmentObject->getProperty('color');
        $colorProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $colorProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for setting invalid color
     */
    public function testSettingInvalidColor()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setColor(new \stdClass());
    }
    
    /**
     * Test for getting color
     */
    public function testGetColor()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $colorProperty = $refAttachmentObject->getProperty('color');
        $colorProperty->setAccessible(true);
        $colorProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getColor());
    }
    
    /**
     * Test for setting pretext
     */
    public function testSettingPretext()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setPretext($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $pretextProperty = $refAttachmentObject->getProperty('pretext');
        $pretextProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $pretextProperty->getValue($attachmentObject));
    }
    
    /**
     * Test setting invalid pretext
     */
    public function testSettingInvalidPretext()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setPretext(new \stdClass());
    }
    
    /**
     * Test for getting pretext
     */
    public function testGetPretext()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $pretextProperty = $refAttachmentObject->getProperty('pretext');
        $pretextProperty->setAccessible(true);
        $pretextProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getPretext());
    }
    
    /**
     * Test for setting author name
     */
    public function testSettingAuthorName()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setAuthorName($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $authorNameProperty = $refAttachmentObject->getProperty('authorName');
        $authorNameProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $authorNameProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for setting invalid author name
     */
    public function testSettingInvalidAuthorName()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setAuthorName(new \stdClass());
    }
    
    /**
     * Test for getting author name
     */
    public function testGetAuthorName()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $authorNameProperty = $refAttachmentObject->getProperty('authorName');
        $authorNameProperty->setAccessible(true);
        $authorNameProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getAuthorName());
    }
    
    /**
     * Testing set of author link
     */
    public function testSettingAuthorLink()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setAuthorLink($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $authorLinkProperty = $refAttachmentObject->getProperty('authorLink');
        $authorLinkProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $authorLinkProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for setting invalid author link 
     */
    public function testSettingInvalidAuthorLink()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setAuthorLink(new \stdClass());
    }
    
    /**
     * Test for getting author link
     */
    public function testGetAuthorLink()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $authorLinkProperty = $refAttachmentObject->getProperty('authorLink');
        $authorLinkProperty->setAccessible(true);
        $authorLinkProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getAuthorLink());
    }
    
    /**
     * Test for setting author icon
     */
    public function testSettingAuthorIcon()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setAuthorIcon($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $authorIconProperty = $refAttachmentObject->getProperty('authorIcon');
        $authorIconProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $authorIconProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for setting invalid author icon
     */
    public function testSettingInvalidAuthorIcon()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setAuthorIcon(new \stdClass());
    }
    
    /**
     * Test for getting author icon
     */
    public function testGetAuthorIcon()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $authorIconProperty = $refAttachmentObject->getProperty('authorIcon');
        $authorIconProperty->setAccessible(true);
        $authorIconProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getAuthorIcon());
    }
    
    /**
     * Test for setting title
     */
    public function testSettingTitle()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setTitle($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $titleProperty = $refAttachmentObject->getProperty('title');
        $titleProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $titleProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for setting invalid title
     */
    public function testSettingInvalidTitle()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setTitle(new \stdClass());
    }
    
    /**
     * Test for getting title
     */
    public function testGetTitle()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $titleProperty = $refAttachmentObject->getProperty('title');
        $titleProperty->setAccessible(true);
        $titleProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getTitle());
    }
    
    /**
     * Test for setting title link
     */
    public function testSettingTitleLink()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setTitleLink($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $titleLinkProperty = $refAttachmentObject->getProperty('titleLink');
        $titleLinkProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $titleLinkProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for getting title link
     */
    public function testSettingInvalidTitleLink()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setTitleLink(new \stdClass());
    }
    
    /**
     * Test for getting title link
     */
    public function testGetTitleLink()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $titleLinkProperty = $refAttachmentObject->getProperty('titleLink');
        $titleLinkProperty->setAccessible(true);
        $titleLinkProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getTitleLink());
    }
    
    /**
     * Test for setting text
     */
    public function testSettingText()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setText($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $textProperty = $refAttachmentObject->getProperty('text');
        $textProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $textProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for setting invalid text
     */
    public function testSettingInvalidText()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setText(new \stdClass());
    }
    
    /**
     * Test for getting text
     */
    public function testGetText()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $textProperty = $refAttachmentObject->getProperty('text');
        $textProperty->setAccessible(true);
        $textProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getText());
    }
    
    /**
     * Test for adding new field
     */
    public function testAddField()
    {
        $attahcmentFieldObject = new AttachmentField();
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->addField($attahcmentFieldObject);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $fieldsProperty = $refAttachmentObject->getProperty('fields');
        $fieldsProperty->setAccessible(true);
        
        $this->assertInstanceOf(AttachmentField::class, $fieldsProperty->getValue($attachmentObject)[0]);
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertInternalType('array', $fieldsProperty->getValue($attachmentObject));
        $this->assertEquals(1, count($fieldsProperty->getValue($attachmentObject)));
    }
    
    /**
     * Test for getting fields
     */
    public function testGetFields()
    {
        $attachmentFieldObject = new AttachmentField();
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $fieldsProperty = $refAttachmentObject->getProperty('fields');
        $fieldsProperty->setAccessible(true);
        $fieldsProperty->setValue($attachmentObject, [$attachmentFieldObject]);
        
        $this->assertInternalType('array', $attachmentObject->getFields());
        $this->assertEquals(1, count($attachmentObject->getFields()));
        $this->assertInstanceOf(AttachmentField::class, $attachmentObject->getFields()[0]);
    }
    
    /**
     * Test for adding action
     */
    public function testAddAction()
    {
        $attahcmentActionObject = new AttachmentAction();
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->addAction($attahcmentActionObject);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $actionsProperty = $refAttachmentObject->getProperty('actions');
        $actionsProperty->setAccessible(true);
        
        $this->assertInstanceOf(AttachmentAction::class, $actionsProperty->getValue($attachmentObject)[0]);
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertInternalType('array', $actionsProperty->getValue($attachmentObject));
        $this->assertEquals(1, count($actionsProperty->getValue($attachmentObject)));
    }
    
    /**
     * Test for adding more that 5 actions
     */
    public function testAddingMoreThanFiveActions()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MORE_THAN_5_ACTIONS_IN_ATTACHMENT);
        $attahcmentActionObject = new AttachmentAction();
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->addAction($attahcmentActionObject)
            ->addAction($attahcmentActionObject)
            ->addAction($attahcmentActionObject)
            ->addAction($attahcmentActionObject)
            ->addAction($attahcmentActionObject)
            ->addAction($attahcmentActionObject)
        ;
    }
    
    /**
     * Test for getting actions
     */
    public function testGetActions()
    {
        $attachmentActionObject = new AttachmentAction();
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $actionsProperty = $refAttachmentObject->getProperty('actions');
        $actionsProperty->setAccessible(true);
        $actionsProperty->setValue($attachmentObject, [$attachmentActionObject]);
        
        $this->assertInternalType('array', $attachmentObject->getActions());
        $this->assertEquals(1, count($attachmentObject->getActions()));
        $this->assertInstanceOf(AttachmentAction::class, $attachmentObject->getActions()[0]);
    }
    
    /**
     * Test for setting image url
     */
    public function testSettingImageUrl()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setImageUrl($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $imageUrlProperty = $refAttachmentObject->getProperty('imageUrl');
        $imageUrlProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $imageUrlProperty->getValue($attachmentObject));
    }
    
    /**
     * Testing setting invalid image url
     */
    public function testSettingInvalidImageUrl()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setImageUrl(new \stdClass());
    }
    
    /**
     * Test for getting image url
     */
    public function testGetImageUrl()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $imageUrlProperty = $refAttachmentObject->getProperty('imageUrl');
        $imageUrlProperty->setAccessible(true);
        $imageUrlProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getImageUrl());
    }
    
    /**
     * Test for setting thumb url
     */
    public function testSettingThumbUrl()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setThumbUrl($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $thumbUrlProperty = $refAttachmentObject->getProperty('thumbUrl');
        $thumbUrlProperty->setAccessible(true);
    
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $thumbUrlProperty->getValue($attachmentObject));
    }
    
    /**
     * Testing setting invalid thumb url
     */
    public function testSettingInvalidThumbUrl()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setThumbUrl(new \stdClass());
    }
    
    /**
     * Test for getting thumb url
     */
    public function testGetThumbUrl()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $thumbUrlProperty = $refAttachmentObject->getProperty('thumbUrl');
        $thumbUrlProperty->setAccessible(true);
        $thumbUrlProperty->setValue($attachmentObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $attachmentObject->getThumbUrl());
    }
    
    /**
     * Test for setting footer
     */
    public function testSettingFooter()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setFooter($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $footerProperty = $refAttachmentObject->getProperty('footer');
        $footerProperty->setAccessible(true);
    
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $footerProperty->getValue($attachmentObject));
    }
    
    /**
     * Testing setting invalid footer
     */
    public function testSettingInvalidFooter()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setFooter(new \stdClass());
    }
    
    /**
     * Test for getting footer
     */
    public function testGetFooter()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $footerProperty = $refAttachmentObject->getProperty('footer');
        $footerProperty->setAccessible(true);
        $footerProperty->setValue($attachmentObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $attachmentObject->getFooter());
    }
    
    /**
     * Test for setting footer icon
     */
    public function testSettingFooterIcon()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setFooterIcon($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $footerIconProperty = $refAttachmentObject->getProperty('footerIcon');
        $footerIconProperty->setAccessible(true);
    
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $footerIconProperty->getValue($attachmentObject));
    }
    
    /**
     * Testing setting invalid footer icon
     */
    public function testSettingInvalidFooterIcon()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setFooterIcon(new \stdClass());
    }
    
    /**
     * Test for getting footer icon
     */
    public function testGetFooterIcon()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $footerIconProperty = $refAttachmentObject->getProperty('footerIcon');
        $footerIconProperty->setAccessible(true);
        $footerIconProperty->setValue($attachmentObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $attachmentObject->getFooterIcon());
    }
    
    /**
     * Test for setting ts
     */
    public function testSettingTs()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setTs($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $tsProperty = $refAttachmentObject->getProperty('ts');
        $tsProperty->setAccessible(true);
    
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $tsProperty->getValue($attachmentObject));
    }
    
    /**
     * Testing setting invalid ts
     */
    public function testSettingInvalidTs()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setTs(new \stdClass());
    }
    
    /**
     * Test for getting ts
     */
    public function testGetTs()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $tsProperty = $refAttachmentObject->getProperty('ts');
        $tsProperty->setAccessible(true);
        $tsProperty->setValue($attachmentObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $attachmentObject->getTs());
    }
    
    /**
     * Test for setting callback id
     */
    public function testSettingCallbackId()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setCallbackId($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $callbackIdProperty = $refAttachmentObject->getProperty('callbackId');
        $callbackIdProperty->setAccessible(true);
    
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $callbackIdProperty->getValue($attachmentObject));
    }
    
    /**
     * Testing setting invalid callback id
     */
    public function testSettingInvalidCallbackId()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setCallbackId(new \stdClass());
    }
    
    /**
     * Test for getting callback id
     */
    public function testGetCallbackId()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $callbackIdProperty = $refAttachmentObject->getProperty('callbackId');
        $callbackIdProperty->setAccessible(true);
        $callbackIdProperty->setValue($attachmentObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $attachmentObject->getCallbackId());
    }
    
    /**
     * Test for setting attachment type
     */
    public function testSettingAttachmentType()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setAttachmentType($this->dummyString);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $attachmentTypeProperty = $refAttachmentObject->getProperty('attachmentType');
        $attachmentTypeProperty->setAccessible(true);
    
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->dummyString, $attachmentTypeProperty->getValue($attachmentObject));
    }
    
    /**
     * Test for setting invalid atatchment type
     */
    public function testSettingInvalidAttachmentType()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_SCALAR);
        $attachmentObject = new Attachment();
        $attachmentObject->setAttachmentType(new \stdClass());
    }
    
    /**
     * Test for getting attachment type
     */
    public function testGetAttachmentType()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $attachmentTypeProperty = $refAttachmentObject->getProperty('attachmentType');
        $attachmentTypeProperty->setAccessible(true);
        $attachmentTypeProperty->setValue($attachmentObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $attachmentObject->getAttachmentType());
    }
    
    /**
     * Test for setting mrkdwnIn
     */
    public function testSetMrkdwnIn()
    {
        $attachmentObject = new Attachment();
        $returnedObject = $attachmentObject->setMrkdwnIn($this->mrkdwnInArray);
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $mrkdwnInProperty = $refAttachmentObject->getProperty('mrkdwnIn');
        $mrkdwnInProperty->setAccessible(true);
        
        $this->assertInstanceOf(Attachment::class, $returnedObject);
        $this->assertEquals($this->mrkdwnInArray, $mrkdwnInProperty->getValue($attachmentObject));
    }
    
    /**
     * Testing setting invalid mrkdwnIn
     */
    public function testSettingInvalidMrkdwnIn()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::INVALID_MRKDWN_IN_VALUES);
        $attachmentObject = new Attachment();
        $attachmentObject->setMrkdwnIn([$this->dummyString]);
    }
    
    /**
     * Test for getting mrkdwnIn
     */
    public function testGetMrkdwnIn()
    {
        $attachmentObject = new Attachment();
        $refAttachmentObject = new \ReflectionObject($attachmentObject);
        $mrkdwnInProperty = $refAttachmentObject->getProperty('mrkdwnIn');
        $mrkdwnInProperty->setAccessible(true);
        $mrkdwnInProperty->setValue($attachmentObject, $this->mrkdwnInArray);
        
        $this->assertEquals($this->mrkdwnInArray, $attachmentObject->getMrkdwnIn());
    }
    
    /**
     * Test that exception is thrown, if required fallback option is not set
     */
    public function testValidateRequiredFallback()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $attachmentObject = new Attachment();
        $attachmentObject->validateRequired();
    }
    
    /**
     * Test that exception is thrown, if callbackId is not set, when there is at least one action
     */
    public function testValidateRequiredNoCallbackIdWithButtons()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $attachmentActionObject = new AttachmentAction();
        $attachmentActionObject ->setText($this->dummyString);
        $attachmentObject = new Attachment();
        $attachmentObject->addAction($attachmentActionObject)
            ->setFallback($this->dummyString)
        ;
        $attachmentObject->validateRequired();
    }
}