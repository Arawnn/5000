<?php

namespace The5000\Controllers\Auth;

use The5000\Controllers\Controller;

class AuthController extends Controller
{
    public function getSignup($request, $response)
    {
        return $this->twig->render($response, 'auth/signup.html.twig');
    }

    public function postSignup($request, $response)
    {

    }
}