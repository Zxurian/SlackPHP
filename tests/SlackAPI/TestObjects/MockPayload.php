<?php 

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Enumerators\Parse;
use MyCLabs\Enum\Enum;

class MockPayload extends AbstractPayload
{
    const METHOD = 'channels.archive';
    
    /** @var string */
    public $string = 'string';
    
    /** @var mixed[] */
    public $array = [];
    
    /** @var int */
    public $integer = 1;
    
    /** @var Enum */
    public $enum = null;
    
    public function __construct()
    {
        $this->enum = Parse::CLIENT();
        $this->array[] = [
            'subProp'   => 1,
            'subProp'   => 'test1'
        ];
        $this->array[] = [
            'subProp'   => 2,
            'subProp'   => 'test3'
        ];
    }
    
    public function validatePayload(){}
}