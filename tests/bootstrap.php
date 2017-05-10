<?php

spl_autoload_register(function($className) {
    $className = str_replace('\\', '/', $className);
    $classFile = __DIR__.'/../src/'.str_replace('SlackPHP/', '', $className).'.php';
    if (file_exists($classFile)) {
        require $classFile;
    }
});