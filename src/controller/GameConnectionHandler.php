<?php

namespace The5000\controller;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use Illuminate\Database\QueryException;
use The5000\model\Game;

class GameConnectionHandler implements MessageComponentInterface {

    protected $clients;
    private $stopServerCallback;


    public function __construct($stopServerCallback) {
        $this->clients = new \SplObjectStorage;
        $this->stopServerCallback = $stopServerCallback;
    }


    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }


    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        printf('Connection %d sending message "%s" to %d other connection%s'."\n", $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        // Stop the server process ?
        if ($msg == 'stop')
            call_user_func($this->stopServerCallback);

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }


    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";

        foreach ($this->clients as $client) {
            $client->send($conn->resourceId . ' has disconnected');
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

}