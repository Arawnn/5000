<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use \Slim\Slim as Slim;

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
	echo '<h1> The 5000 </h1>';
	echo '<p>'.password_hash('123456',  PASSWORD_BCRYPT).'</p>';
})->name('home');


// Runs Slim
$app->run();