<?php

namespace Tests\SlackAPI\Models\AbstractModels;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Payloads\ChatUpdate;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers AbstractModel
 */
class ChannelsListResponseTest extends TestCase
{
    private $dummyString = 'string';
    
    /**
     * Test that no exceptions is thrown, if all the required fields are set
     */
    public function testValidateRequired()
    {
        $chatUpdateObject = new ChatUpdate();
        $chatUpdateObject
            ->setTs($this->dummyString)
            ->setChannel($this->dummyString)
            ->setText($this->dummyString)
        ;
        $chatUpdateObject->validateRequired();
    }
    
    /**
     * Test that exception will be thrown if required field is missing
     */
    public function testValidateMissingRequired()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::MISSING_REQUIRED_FIELD);
        $chatUpdateObject = new ChatUpdate();
        $chatUpdateObject
            ->setTs($this->dummyString)
            ->setChannel($this->dummyString)
        ;
        $chatUpdateObject->validateRequired();
    }
}