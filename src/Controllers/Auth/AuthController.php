<?php

namespace The5000\Controllers\Auth;

use The5000\Controllers\Controller;
use The5000\Models\Account;

class AuthController extends Controller
{
    public function getSignup($request, $response)
    {
        return $this->twig->render($response, 'auth/signup.html.twig');
    }

    public function postSignup($request, $response)
    {
        $account = Account::create([
                'pseudo' => $request->getParam('pseudo'),
                'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT, ['cost' => 10])
            ]);
        return $response->withRedirect($this->router->pathFor('home'));
    }
}