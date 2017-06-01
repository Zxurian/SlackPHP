<?php 

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use SlackPHP\SlackAPI\Models\Abstracts\MagicGetter;

class MockMagicGetter extends MagicGetter
{
    private $test = 'test';
}