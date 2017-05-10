<?php

namespace Tests\SlackAPI\Models;

use SlackPHP\SlackAPI\Models\ActionConfirm;

class ActionConfirmTest extends \PHPUnit_Framework_TestCase
{
    private $mockString = 'string';
    public function testSetTitle()
    {
        $actionConfirmObject = new ActionConfirm();
        $actionConfirmObject->setTitle($this->mockString);
        
        $refActionConfirmObject = new \ReflectionObject($actionConfirmObject);
        $titleProperty = $refActionConfirmObject->getProperty('title');
        $titleProperty->setAccessible(true);
        
        $this->assertEquals($this->mockString, $titleProperty->getValue($actionConfirmObject));
    }
}