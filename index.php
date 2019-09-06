<?php
require __DIR__ . '/vendor/autoload.php';
use DI\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Middleware\ContentLengthMiddleware;
use Slim\Psr7\Response as Response;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Views\TwigMiddleware;
use The5000\model\Account as Account;
use The5000\controller\AccountController as AccountController;


/**
 * DEPENDENCIES INJECTIONS
 */
$container = new Container();
$container->set('HomeController', function(ContainerInterface $c) {
	$view = $c->get('view');
	return new HomeController($view);
});

AppFactory::setContainer($container);

// Instantiate App
$app = AppFactory::create();


// Add error middleware
$app->addErrorMiddleware(true, true, true);


/**
 * TWIG MIDDLEWARE
 */

$routeParser = $app->getRouteCollector()->getRouteParser();
$twig = new Twig(__DIR__ . './templates');
$twigMiddleware = new TwigMiddleware($twig, $container, $routeParser);
$app->add($twigMiddleware);


/**
 * ROUTING
 */

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


//  $app->get('/', '\HomeController:home');



$app->get('/{name}', function (Request $request, Response $response, array $args) {
	return $this->get('view')->render($response, 'layout.html.twig', [
		'name' => $args['name']
	]);
});

// Run Slims
$app->run();