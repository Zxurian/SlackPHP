<?php

namespace SlackPHP\DeepLink\Abstracts;

use SlackPHP\DeepLink\Interfaces\LinkInterface;

/**
 * Class used to create full DeepLink url link with createURL method
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package DeepLink
 * @version 0.3
 * @see https://api.slack.com/docs/deep-linking
 */
class DeepLink implements LinkInterface
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