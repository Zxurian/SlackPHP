<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;
use SlackPHP\SlackAPI\Models\Objects\Group;

/**
 * Class, used for deserialization of responce payload of groups list
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.2
 * 
 * @method array getGroups()
 */
class GroupsListResponse extends AbstractPayloadResponse
{
    /**
     * @var Group[]|NULL
     * @Type("array<SlackPHP\SlackAPI\Models\Objects\Group>")
     */
    protected $groups = null;
}