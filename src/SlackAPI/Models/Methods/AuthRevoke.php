<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Enumerators\Method;

/**
 * This method revokes an access token. Use it when you no longer need a token.
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @see https://api.slack.com/methods/auth.revoke
 * @package SlackAPI
 * @version 0.2
 * 
 * @method string getTest()
 */
class AuthRevoke extends AbstractPayload
{
    const METHOD = method::AUTH_REVOKE;
    
    /** @var bool|NULL */
    protected $test = null;
    
    /**
     * Setting this parameter to true triggers a testing mode where the specified token will not actually be revoked.
     * 
     * @param bool $test
     * @throws \InvalidArgumentException
     * @return AuthRevoke
     */
    public function setTest($test)
    {
        if (!is_bool($test)) {
            throw new \InvalidArgumentException('Test should be a boolean type');
        }
        
        $this->test = $test;
        
        return $this;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Models\Abstracts\PayloadInterface::validatePayload()
     */
    public function validatePayload(){}
}