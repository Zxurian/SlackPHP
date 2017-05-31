<?php 

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;

class MockAbstractPayload extends AbstractPayload
{
    private $string = 'string';
    
    private $array = [
        'key' => 'value',
    ];
    
    private $integer = 1;
    
    public function validatePayload(){}
}