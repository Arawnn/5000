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

$app->get('/login', 'AuthController:getSignup')->setName('auth.signup');
$app->post('/login', 'AuthController:postSignup');

