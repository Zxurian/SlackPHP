<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Objects\Args;

/**
 * Class, used for deserialization of response payload received after testing your calling code
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getArgs()
 */
class ApiTestResponse extends AbstractPayloadResponse
{
    /**
     * @var Args|NULL
     * @Type("SlackPHP\SlackAPI\Models\Objects\Args")
     */
    protected $args = null;
}