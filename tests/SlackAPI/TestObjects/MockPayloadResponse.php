<?php

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use SlackPHP\Tests\SlackAPI\TestObjects\MockEnum;
use JMS\Serializer\Annotation\Type;

class MockPayloadResponse extends AbstractPayloadResponse
{
    /**
     * @var string
     * @Type ("string")
     */
    public $string = null;
    
    /**
     * @var int
     * @Type ("integer")
     */
    public $integer = null;
    
    /**
     * @var MockEnum
     * @Type("MyCLabsEnum<SlackPHP\Tests\SlackAPI\TestObjects\MockEnum>")
     */
    public $enum = null;
    
    /**
     * @var MyCLabsEnum[]
     * @Type("MyCLabsEnum<SlackPHP\Tests\SlackAPI\TestObjects\MockEnum>")
     */
    public $array1 = [];
    
    /**
     * @var string[]
     * @Type("array<string>")
     */
    public $array2 = [];
    
}