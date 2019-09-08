<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/settings.php';
// Instantiate the app
$app = new \Slim\App(['settings' => $settings]);

// Set up dependencies
require  __DIR__ . '/container.php';

// Register middleware
require __DIR__ . '/middleware.php';

// Register routes
require __DIR__ . '/routes.php';

return $app;