<?php

namespace The5000\Controllers\Auth;

use The5000\Controllers\Controller;
use The5000\Models\Account;
use Respect\Validation\Validator as v;


class AuthController extends Controller
{



    public function getSignup($request, $response)
    {
        return $this->twig->render($response, 'auth/signup.html.twig');
    }

    public function postSignup($request, $response)
    {
        $validator = $this->validator->validate($request, [
            'pseudo' => v::noWhitespace()->notEmpty()->alpha()->pseudoAvailable(),
            'password' => v::noWhitespace()->notEmpty()
        ]);

        if( $validator->failed() )
        {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $account = Account::create([
                'pseudo' => $request->getParam('pseudo'),
                'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT, ['cost' => 10])
            ]);
        return $response->withRedirect($this->router->pathFor('home'));
    }
}