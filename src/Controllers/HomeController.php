<?php

namespace The5000\Controllers;


class HomeController extends Controller
{
    public function index($request, $response, $args)
    {
        return $this->twig->render($response, 'home.twig', [
            'name' => 'Michel',
            'now' => date('Y:m:d H:i:s')
        ]);
    }
}