<?php

session_start();
require_once __DIR__.'/../app/Config.php';

spl_autoload_register(function ($name) {
    require_once str_replace('\\', '/', $name).'.php';
});