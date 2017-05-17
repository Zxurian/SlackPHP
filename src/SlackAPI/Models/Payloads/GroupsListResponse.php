<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

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
     * @var array|NULL
     * @Type("array")
     */
    protected $groups = null;
}