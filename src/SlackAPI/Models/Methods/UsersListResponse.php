<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Objects\User;

/**
 * Class, used for deserialization of response users list payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.2
 * 
 * @method array getMembers()
 */
class UsersListResponse extends AbstractPayloadResponse
{
    /**
     * @var User[]|NULL
     * @Type("array<SlackPHP\SlackAPI\Models\Objects\User>")
     */
    protected $members = null;

}