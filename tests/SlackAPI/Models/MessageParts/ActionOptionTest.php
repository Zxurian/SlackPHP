<?php

namespace Tests\SlackAPI\Models\MessageParts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Exceptions\SlackException;
use SlackPHP\SlackAPI\Models\MessageParts\ActionOption;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers ActionOption
 */
class ActionOptionTest extends TestCase
{
    
    private $dummyString = 'string';
    
    /**
     * Testing setter of text
     */
    public function testSettingText()
    {
        $actionOptionObject = new ActionOption();
        $returnedObject = $actionOptionObject->setText($this->dummyString);
        $refActionOptionObject = new \ReflectionObject($actionOptionObject);
        $textProperty = $refActionOptionObject->getProperty('text');
        $textProperty->setAccessible(true);
        
        $this->assertInstanceOf(ActionOption::class, $returnedObject);
        $this->assertEquals($this->dummyString, $textProperty->getValue($actionOptionObject));
    }
    
    /**
     * Test setting invalid text
     */
    public function testSettingInvalidText()
    {
        $this->expectException(\InvalidArgumentException::class);
        $actionOption = new ActionOption();
        $actionOption->setText(new \stdClass());
    }
    
    /**
     * Test getting text
     */
    public function testGetText()
    {
        $actionOptionObject = new ActionOption();
        $refActionOptionObject = new \ReflectionObject($actionOptionObject);
        $textProperty = $refActionOptionObject->getProperty('text');
        $textProperty->setAccessible(true);
        $textProperty->setValue($actionOptionObject, $this->dummyString);
        
        $this->assertEquals($this->dummyString, $actionOptionObject->getText());
    }
    
    /**
     * Testing setter of value
     */
    public function testSettingValue()
    {
        $actionOptionObject = new ActionOption();
        $returnedObject = $actionOptionObject->setValue($this->dummyString);
        $refActionOptionObject = new \ReflectionObject($actionOptionObject);
        $valueProperty = $refActionOptionObject->getProperty('value');
        $valueProperty->setAccessible(true);
        
        $this->assertInstanceOf(ActionOption::class, $returnedObject);
        $this->assertEquals($this->dummyString, $valueProperty->getValue($actionOptionObject));
    }
    
    /**
     * Test setting invalid value
     */
    public function testSettingInvalidValue()
    {
        $this->expectException(\InvalidArgumentException::class);
        $actionOption = new ActionOption();
        $actionOption->setValue(new \stdClass());
    }
    
    /**
     * Test getting value
     */
    public function testGetValue()
    {
        $actionOptionObject = new ActionOption();
        $refActionOptionObject = new \ReflectionObject($actionOptionObject);
        $valueProperty = $refActionOptionObject->getProperty('value');
        $valueProperty->setAccessible(true);
        $valueProperty->setValue($actionOptionObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $actionOptionObject->getValue());
    }
    
    /**
     * Testing setter of description
     */
    public function testSettingDescription()
    {
        $actionOptionObject = new ActionOption();
        $returnedObject = $actionOptionObject->setDescription($this->dummyString);
        $refActionOptionObject = new \ReflectionObject($actionOptionObject);
        $descriptionProperty = $refActionOptionObject->getProperty('description');
        $descriptionProperty->setAccessible(true);
    
        $this->assertInstanceOf(ActionOption::class, $returnedObject);
        $this->assertEquals($this->dummyString, $descriptionProperty->getValue($actionOptionObject));
    }
    
    /**
     * Test setting invalid description
     */
    public function testSettingInvalidDescription()
    {
        $this->expectException(\InvalidArgumentException::class);
        $actionOption = new ActionOption();
        $actionOption->setDescription(new \stdClass());
    }
    
    /**
     * Test getting description
     */
    public function testGetDescription()
    {
        $actionOptionObject = new ActionOption();
        $refActionOptionObject = new \ReflectionObject($actionOptionObject);
        $descriptionProperty = $refActionOptionObject->getProperty('description');
        $descriptionProperty->setAccessible(true);
        $descriptionProperty->setValue($actionOptionObject, $this->dummyString);
    
        $this->assertEquals($this->dummyString, $actionOptionObject->getDescription());
    }
    
    /**
     * Test that exception is thrown if required text property is not set
     */
    public function testValidateModelText()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $actionOptionObject = new ActionOption();
        $actionOptionObject->setValue($this->dummyString);
        $actionOptionObject->validateModel();
    }
    
    /**
     * Test that exception is thrown if required value property is not set
     */
    public function testValidateModelValue()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $actionOptionObject = new ActionOption();
        $actionOptionObject->setText($this->dummyString);
        $actionOptionObject->validateModel();
    }
}