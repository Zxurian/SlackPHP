<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of response on auth revoke payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.2
 * 
 * @method bool getRevoked()
 */
class AuthRevokeResponse extends AbstractPayloadResponse
{
    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $revoked = null;
}