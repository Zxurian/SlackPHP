<?php

namespace Tests\SlackAPI\Models;

use SlackPHP\SlackAPI\Models\ActionOptionGroup;
use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\ActionOption;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
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
        $actionOptionGroupObject->setText($this->dummyString);
        $refActionOptionGroupObject = new \ReflectionObject($actionOptionGroupObject);
        $textProperty = $refActionOptionGroupObject->getProperty('text');
        $textProperty->setAccessible(true);
        
        $this->assertEquals($this->dummyString, $textProperty->getValue($actionOptionGroupObject));
    }
    
    /**
     * Testing set invalid text
     */
    public function testSettingInvalidText()
    {
        $this->expectException(SlackException::class, '', SlackException::NOT_SCALAR);
        $actionOptionGroup = new ActionOptionGroup();
        $actionOptionGroup->setText(new \stdClass());
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
        $optionsPropery = $refActionOptionGroupObject->getProperty('options');
        $optionsPropery->setAccessible(true);
        
        $this->assertInstanceOf(ActionOptionGroup::class, $returnedObject);
        $this->assertInternalType('array', $optionsPropery->getValue($actionOptionGroupObject));
        $this->assertEquals(1, count($optionsPropery->getValue($actionOptionGroupObject)));
        $this->assertInstanceOf(ActionOption::class, $optionsPropery->getValue($actionOptionGroupObject)[0]);
    }

    /**
     * Test for getter of actionOptions
     */
    public function testGetOptions()
    {
        $actionOption = new ActionOption();
        $actionOptionGroupObject = new ActionOptionGroup();
        $refActionOptionGroupObject = new \ReflectionObject($actionOptionGroupObject);
        $optionsPropery = $refActionOptionGroupObject->getProperty('options');
        $optionsPropery->setAccessible(true);
        $optionsPropery->setValue($actionOptionGroupObject, [$actionOption]);
        
        $this->assertInternalType('array', $actionOptionGroupObject->getOptions());
        $this->assertEquals(1, count($actionOptionGroupObject->getOptions()));
        $this->assertInstanceOf(ActionOption::class, $actionOptionGroupObject->getOptions()[0]);
    }
}