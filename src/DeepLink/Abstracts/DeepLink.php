<?php

namespace SlackPHP\DeepLink\Abstracts;

/**
 * Class used to create full DeepLink url link with createURL method
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 */
class DeepLink
{
    const SLACK_DEEP_LINK = 'slack://';
    
    /**
     * Create complete DeepLink url
     * 
     * @return string
     */
    public function createURL()
    {
        $parameters = http_build_query($this->getQueryParameters());
        
        return self::SLACK_DEEP_LINK.static::BASE.($parameters != '' ? '?'.$parameters : '');
    }
}