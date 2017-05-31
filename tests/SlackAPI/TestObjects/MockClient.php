<?php 

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use GuzzleHttp\ClientInterface;

class MockClient implements ClientInterface
{
    public function getConfig(){}
    public function sendAsync($request){}
    public function send($request){}
    public function request($method, $uri){}
    public function requestAsync($method, $uri){}
    
}