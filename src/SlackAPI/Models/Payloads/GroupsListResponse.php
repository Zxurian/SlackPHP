<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of responce payload of groups list
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class GroupsListResponse extends AbstractPayloadResponse
{
    /**
     * @var array|NULL
     * @Type("array")
     */
    private $groups = null;
    
    /**
     * Getter for groups array
     *
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }
}