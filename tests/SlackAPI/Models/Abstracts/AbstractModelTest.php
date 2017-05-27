<?php

namespace Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Methods\ChatUpdate;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
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
        $chatUpdateObject = new ChatUpdate();
        $chatUpdateObject
            ->setToken($this->dummyString)
            ->setTs($this->dummyString)
            ->setChannel($this->dummyString)
            ->setText($this->dummyString)
        ;
        $chatUpdateObject->validateRequired($chatUpdateObject);
    }
}