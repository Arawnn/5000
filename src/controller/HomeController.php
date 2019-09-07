<?php
namespace The5000\Controller;
use Slim\Views\Twig;

class HomeController
{
    protected $view;

    public function __construct(\Slim\Views\Twig $view)
    {
        $this->view = $view;
    }

    public function home($request, $response, $args)
    {
        // var_dump($request);
        // var_dump($response);
        // $body = $response->getBody();
        // return $body;
        return $this->get('view')->render($response, 'layout.html.twig', [
            'name' => $args['name']
        ]);
        // return $response;
    }
}