<?php

// start an temporary session
session_start();

// autoload
require_once  __DIR__ . '/../vendor/autoload.php';

// bootstrap application for handling request
$app = new App\Application();
$app->handle();