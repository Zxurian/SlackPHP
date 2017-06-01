<?php 

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Enumerators\Parse;

class MockPayload extends AbstractPayload
{

    private $string = 'string';
    
    private $array = ['value'];
    
    private $integer = 1;
    
    private $parse = null;
    
    public function __construct()
    {
        $this->parse = Parse::CLIENT();
    }
    
    public function validatePayload(){}
}