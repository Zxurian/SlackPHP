<?php

namespace SlackPHP\DeepLink\Interfaces;

/**
 * Interface for getting parameters for query creation
 * 
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @package DeepLink
 * @version 0.3
 */
interface LinkInterface
{
    /**
     * Get parameters for query construction 
     * 
     * @return array
     */
    public function getQueryParameters();
}