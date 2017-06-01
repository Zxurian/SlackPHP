<?php

namespace SlackPHP\Tests\SlackAPI\Models\Abstracts;

use PHPUnit\Framework\TestCase;
use SlackPHP\Tests\SlackAPI\TestObjects\MockPayloadResponse;

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
        $mockAbstractResponsePayload = new MockPayloadResponse();
        $payloadResponseObject = MockPayloadResponse::createFromJson($stringResponse);
        $this->assertInstanceOf(MockPayloadResponse::class, $payloadResponseObject);
        $this->assertTrue($payloadResponseObject->getOk());
    }
}