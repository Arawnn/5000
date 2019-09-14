<?php

if(!isset($_SESSION))
{
    session_start();
}
/** @var Slim\App $app */
$app = require __DIR__ . '/../config/bootstrap.php';
// Start
$app->run();









