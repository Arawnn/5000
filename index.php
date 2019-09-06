<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use \Slim\Slim as Slim;

// use Ratchet\Server\IoServer;
// use Ratchet\Http\HttpServer;
// use Ratchet\WebSocket\WsServer;

use The5000\model\Account as Account;

use The5000\controller\AccountController as AccountController;

// Configures database
$db = new DB();
$db->addConnection(parse_ini_file('src/conf/config.ini'));
$db->setAsGlobal();
$db->bootEloquent();

session_start();

// Creates Slim instance 
$app = new Slim();
$app->config(['routes.case_sensitive' => false]);


// Home page
$app->get('/', function() {
    ?>
    <h1> The 5000 </h1>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/game.css">
    <input id="query_input" type="text" name="query_input" placeholder="Commandes..." disabled>
    <p id="responses"></p>
    <script src='script/game.js'></script>
    <?php
})->name('home');


// Runs Slim
$app->run();