<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

use The5000\controller\GameConnectionHandler;

define('PORT', 15373);

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new GameConnectionHandler('stopCallback')
        )
    ),
    PORT
);
$server->run();


function stopCallback() {
	global $server;
    echo 'Stopping server';
    $server->loop->stop();
}