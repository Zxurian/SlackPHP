<?php

namespace SlackPHP\SlackAPI\Models\Payloads;

use SlackPHP\SlackAPI\Models\AbstractModels\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of response users list payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class UsersListResponse extends AbstractPayloadResponse
{
    /**
     * @var array|NULL
     * @Type("array")
     */
    private $members = null;
    
    /**
     * Getter for members array
     *
     * @return array
     */
    public function getMembers()
    {
        return $this->members;
    }
}