<?php

namespace SlackPHP\SlackAPI\Models\Methods;

use SlackPHP\SlackAPI\Models\Abstracts\AbstractPayload;
use SlackPHP\SlackAPI\Enumerators\Method;
use SlackPHP\SlackAPI\Exceptions\SlackException;

/**
 * This method moves the read cursor in a private channel.
 *
 * @author Dzianis Zhaunerchyk <dzhaunerchyk@gmail.com>
 * @author Zxurian
 * @see https://api.slack.com/methods/groups.mark
 * @package SlackAPI
 * @version 0.2
 *
 * @method string getChannel()
 * @method string getTs()
 */
class GroupsMark extends AbstractPayload
{
    const METHOD = Method::GROUPS_MARK;
    
    /** @var string $channel */
    protected $channel = null;
    
    /** @var string $ts */
    protected $ts = null;
    
    /**
     * Private channel to set reading cursor in.
     *
     * @param string $channel
     * @throws \InvalidArgumentException
     * @return GroupsMark
     */
    public function setChannel($channel)
    {
        if (!is_scalar($channel)) {
            throw new \InvalidArgumentException('setChannel should be a scalar type');
        }
    
        $this->channel = (string)$channel;
    
        return $this;
    }
    
    /**
     * Timestamp of the most recently seen message.
     *
     * @param string $ts
     * @throws \InvalidArgumentException
     * @return GroupsMark
     */
    public function setTs($ts)
    {
        if (!is_scalar($ts)) {
            throw new \InvalidArgumentException('setTs should be a scalar type');
        }
    
        $this->ts = (string)$ts;
    
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * @see \SlackPHP\SlackAPI\Models\Abstracts\PayloadInterface::validatePayload()
     */
    public function validatePayload()
    {
        if ($this->channel === null) {
            throw new SlackException('Must provide channel with a groups.mark payload', SlackException::MISSING_REQUIRED_FIELD);
        }
        
        if ($this->ts === null) {
            throw new SlackException('Must provide ts when sending a groups.mark payload', SlackException::MISSING_REQUIRED_FIELD);
        }
    }
}