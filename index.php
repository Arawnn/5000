<?php

require __DIR__ . '/vendor/autoload.php';

use DI\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;
use Slim\App as Slim;
use Slim\Views\TwigExtension;
use Slim\Views\TwigMiddleware;
use The5000\model\Account as Account;
use The5000\controller\AccountController as AccountController;
use Psr\Container\ContainerInterface as ContainerInterface;

/**
 * DEPENDENCIES INJECTIONS
 */
$container = new Container();


// Instantiate App
$app = new Slim();


/**
 * TWIG MIDDLEWARE
 */



/**
 * ROUTING
 */

$app->get('/', function (Request $request, Response $response, array $args) {
	return $response->getBody()->write('V3');
})->setName('home');

// Run Slims
$app->run();