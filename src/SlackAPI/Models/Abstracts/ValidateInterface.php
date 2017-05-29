<?php

namespace SlackPHP\SlackAPI\Models\Abstracts;

use SlackPHP\SlackAPI\Exceptions\SlackException;

interface ValidateInterface
{
    /**
     * Validate the model
     * 
     * @throws SlackException
     */
    public function validateModel();
}