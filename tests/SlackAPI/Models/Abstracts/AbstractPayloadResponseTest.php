<?php

namespace SlackPHP\Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\Tests\SlackAPI\TestObjects\MockAbstractPayloadResponse;

/**
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @covers AbstractPayloadResponse
 */
class AbstractPayloadResponseTest extends TestCase
{
    /**
     * Test for parsing response json string
     */
    public function testParseResponse()
    {
        $stringResponse = '{"ok":true}';
        $mockAbstractResponsePayload = new MockAbstractPayloadResponse();
        $payloadResponseObject = MockAbstractPayloadResponse::parseResponse($stringResponse);
        $this->assertInstanceOf(MockAbstractPayloadResponse::class, $payloadResponseObject);
        $this->assertTrue($payloadResponseObject->getOk());
    }
}