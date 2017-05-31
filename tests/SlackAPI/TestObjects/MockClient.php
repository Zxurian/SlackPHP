<?php 

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;

class MockClient implements ClientInterface
{
    public function getConfig($option = null){}
    public function sendAsync(RequestInterface $request, array $options = []){}
    public function send(RequestInterface $request, array $options = []){}
    public function request($method, $uri = '', array $options = []){}
    public function requestAsync($method, $uri = '', array $options = []){}
    
}