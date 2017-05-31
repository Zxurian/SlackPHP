<?php 

namespace SlackPHP\Tests\SlackAPI\TestObjects;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class MockEventDispatcher implements EventDispatcherInterface
{
    public function dispatch($eventName, Event $event = null){}
    public function addListener($eventName, $listener, $priority = 0){}
    public function addSubscriber(EventSubscriberInterface $subscriber){}
    public function removeListener($eventName, $listener){}
    public function removeSubscriber(EventSubscriberInterface $subscriber){}
    public function getListeners($eventName = null){}
    public function getListenerPriority($eventName, $listener){}
    public function hasListeners($eventName = null){}
}