<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayloadResponse;
use JMS\Serializer\Annotation\Type;

/**
 * Class, used for deserialization of auth test response payload
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getUrl()
 * @method string getTeam()
 * @method string getUser()
 * @method string getTeamId()
 * @method string getUserId()
 * @method string getEnterpriseId()
 */
class AuthTestResponse extends AbstractPayloadResponse
{
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $url = null;
    
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $team = null;
    
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $user = null;
    
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $teamId = null;
    
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $userId = null;
    
    /**
     * @var string|NULL
     * @Type("string")
     */
    protected $enterpriseId = null;
}