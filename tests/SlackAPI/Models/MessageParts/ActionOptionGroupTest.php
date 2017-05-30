<?php

namespace Tests\SlackAPI\Models\MessageParts;

use SlackPHP\SlackAPI\Models\MessageParts\ActionOptionGroup;
use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\MessageParts\ActionOption;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @covers ActionOptionGroup
 */
class ActionOptionGroupTest extends TestCase
{
    private $dummyString = 'string';
    
    /**
     * Test setting text
     */
    public function testSettingText()
    {
        $actionOptionGroupObject = new ActionOptionGroup();
        $returnedObject = $actionOptionGroupObject->setText($this->dummyString);
        $refActionOptionGroupObject = new \ReflectionObject($actionOptionGroupObject);
        $textProperty = $refActionOptionGroupObject->getProperty('text');
        $textProperty->setAccessible(true);
        
        $this->assertInstanceOf(ActionOptionGroup::class, $returnedObject);
        $this->assertEquals($this->dummyString, $textProperty->getValue($actionOptionGroupObject));
    }
    
    /**
     * Testing set invalid text
     */
    public function testSettingInvalidText()
    {
        $this->expectException(\InvalidArgumentException::class);
        $actionOptionGroup = new ActionOptionGroup();
        $actionOptionGroup->setText(null);
    }
    
    /**
     * Test getting text
     */
    public function testGetText()
    {
        $actionOptionGroupObject = new ActionOptionGroup();
        $refActionOptionGroupObject = new \ReflectionObject($actionOptionGroupObject);
        $textProperty = $refActionOptionGroupObject->getProperty('text');
        $textProperty->setAccessible(true);
        $textProperty->setValue($actionOptionGroupObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $actionOptionGroupObject->getText());
    }
    
    /**
     * Test for adding ActionOption
     */
    public function testAddOption()
    {
        $actionOption = new ActionOption();
        $actionOptionGroupObject = new ActionOptionGroup();
        $returnedObject = $actionOptionGroupObject->addOption($actionOption);
        $refActionOptionGroupObject = new \ReflectionObject($actionOptionGroupObject);
        $optionsProperty = $refActionOptionGroupObject->getProperty('options');
        $optionsProperty->setAccessible(true);
        
        $this->assertInstanceOf(ActionOptionGroup::class, $returnedObject);
        $this->assertInternalType('array', $optionsProperty->getValue($actionOptionGroupObject));
        $this->assertEquals(1, count($optionsProperty->getValue($actionOptionGroupObject)));
        $this->assertInstanceOf(ActionOption::class, $optionsProperty->getValue($actionOptionGroupObject)[0]);
    }

    /**
     * Test for getter of actionOptions
     */
    public function testGetOptions()
    {
        $actionOption = new ActionOption();
        $actionOptionGroupObject = new ActionOptionGroup();
        $refActionOptionGroupObject = new \ReflectionObject($actionOptionGroupObject);
        $optionsProperty = $refActionOptionGroupObject->getProperty('options');
        $optionsProperty->setAccessible(true);
        $optionsProperty->setValue($actionOptionGroupObject, [$actionOption]);
        
        $this->assertInternalType('array', $actionOptionGroupObject->getOptions());
        $this->assertEquals(1, count($actionOptionGroupObject->getOptions()));
        $this->assertInstanceOf(ActionOption::class, $actionOptionGroupObject->getOptions()[0]);
    }
    
    /**
     * Test that exception is thrown, if required text property is not set
     */
    public function testValidateModelText()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $actionOption = new ActionOption();
        $actionOption->setValue($this->dummyString)
            ->setText($this->dummyString)
        ;
        $actionOptionGroupObject = new ActionOptionGroup();
        $actionOptionGroupObject->addOption($actionOption);
        $actionOptionGroupObject->validateModel();
    }
    
    /**
     * Test that exception is thrown, if no options added
     */
    public function testValidateModelNoOptions()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::NOT_ENOUGH_OPTIONS);

        $actionOptionGroupObject = new ActionOptionGroup();
        $actionOptionGroupObject->setText($this->dummyString);
        $actionOptionGroupObject->validateModel();
    
    }
}