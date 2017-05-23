<?php

namespace Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\SlackAPI\Models\Methods\ChannelsListResponse;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers AbstractPayloadResponse
 */
class AbstractPayloadResponseTest extends TestCase
{
    private $dummyValidJSONString = '
    {
        "ok": true,
        "channels": [
            {
                "id": "string"
            }
        ]
    }';
    
    private $dummyInvalidJSONString = '
    {
        "channels": [
            {
                "id": "string"
            }
        ]
    }';
    
    /**
     * Test parsing response json
     */
    public function testParseResponse()
    {
        $parsedResponseObject = ChannelsListResponse::parseResponse($this->dummyValidJSONString);
        $channel = $parsedResponseObject->getChannels()[0];

        $this->assertEquals(true, $parsedResponseObject->getOk());
        $this->assertEquals('string', $channel->getId());
        $this->assertInstanceOf(ChannelsListResponse::class, $parsedResponseObject);
    }
    
    /**
     * Text that exception is thrown if ok status not received in response paylaod
     */
    public function testParseResponseInvalidDeserializeReturn()
    {
        $this->expectException(SlackException::class);
        $this->expectExceptionCode(SlackException::OK_STATUS_NOT_RECEIVED);
        $parsedResponseObject = ChannelsListResponse::parseResponse($this->dummyInvalidJSONString);
    }
}