<?php
namespace The5000\controller;

class HomeController
{
    protected $view;

    public function __construct(\Slim\Views\Twig $view)
    {
        $this->view = $view;
    }

    public function home($request, $response, $args)
    {
        return $this->get('view')->render($response, 'layout.html.twig', [
            'name' => $args['name']
        ]);
        // return $response;
    }
}