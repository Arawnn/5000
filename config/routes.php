<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use \Psr\Http\Message\ResponseInterface as Response;

// $app->get('/', function (Request $request, Response $response, array $args) {
//     $args = [
//         'now' => date('Y-m-d H:i:s')
//     ];
// 	return $this->get('twig')->render($response, 'layout.html.twig', $args);
// })->setName('home');

$app->get('/', 'HomeController:index')->setName('home');

$app->get('/signup', 'AuthController:getSignup')->setName('auth.signup');
$app->post('/signup', 'AuthController:postSignup');

$app->get('/signin', 'AuthController:getSignin')->setName('auth.signin');
$app->post('/signin', 'AuthController:postSignin');

$app->get('/signout', 'AuthController:getSignout')->setName('auth.signout');
