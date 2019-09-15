<?php

use Slim\Container;
use Slim\Views\Twig;

/** @var \Slim\App $app */
$container = $app->getContainer();

// Activating routes in a subfolder
$container['environment'] = function () {
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);

    return new Slim\Http\Environment($_SERVER);
};

$settings = $container->get('settings');

$container['logger'] = function(Container $c) use ($settings) {
	$logger = new \Monolog\Logger('my_logger');
	$fh = new \Monolog\Handler\StreamHandler($settings['logs']. '/app.log');
    $logger->pushHandler($fh);
    
	return $logger;
};


$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($settings['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function(Container $c) use ($capsule) {
    return $capsule;
};

$container['twig'] = function(Container $container) use($settings) {
    $viewPath = $settings['twig']['path'];

    $twig = new Twig($viewPath, [
        'cache' => $settings['twig']['cache_enabled'] ? $settings['twig']['cache_path'] : false
    ]);

    /** @var Twig_Loader_Filesystem $loader */
    $loader = $twig->getLoader();
    $loader->addPath($settings['public'], 'public');

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment($container->get('environment'));
    $twig->addExtension(new \Slim\Views\TwigExtension($router,$uri));

    return $twig;
};

$container['validator'] = function(Container $container) {
    return new The5000\Validation\Validator;
};

$container['csrf'] = function(Container $container) {
    return new Slim\Csrf\Guard;
};

$container['auth'] = function(Container $container) {
    return new The5000\Auth\Auth;
};

$container['HomeController'] = function(Container $container) {
    return new \The5000\Controllers\HomeController($container);
};

$container['AuthController'] = function(Container $container) {
    return new \The5000\Controllers\Auth\AuthController($container);
};