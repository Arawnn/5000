<?php

namespace The5000\Controllers\Auth;

use The5000\Controllers\Controller;
use The5000\Models\Account;
use Respect\Validation\Validator as v;


class AuthController extends Controller
{
    public function getSignout($request, $response)
    {
        $this->auth->logout();

        $this->flash->addMessage('info', 'You successfully have been sign out');
        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignin($request, $response)
    {
        return $this->twig->render($response, 'auth/signin.html.twig');
    }

    public function postSignin($request, $response)
    {
        $auth = $this->auth->connect(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth) {
            $this->flash->addMessage('error', 'You cannot login with this credentials');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }
        $this->flash->addMessage('info', 'You successfully have been signed up');
        return $response->withRedirect($this->router->pathFor('home'));
    }


    public function getSignup($request, $response)
    {
        return $this->twig->render($response, 'auth/signup.html.twig');
    }

    public function postSignup($request, $response)
    {
        $validator = $this->validator->validate($request, [
            'pseudo' => v::noWhitespace()->notEmpty()->alpha()->pseudoAvailable(),
            'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'password' => v::noWhitespace()->notEmpty()
        ]);

        if ($validator->failed()) {
            $this->flash->addMessage('error', 'There are items that require your attention');
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $account = Account::create([
            'pseudo' => $request->getParam('pseudo'),
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT, ['cost' => 10])
        ]);

        $this->flash->addMessage('info', 'You successfully have been signed up');

        $this->auth->connect($account->email, $request->getParam('password'));
        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getChangePassword($request, $response)
    {
        return $this->twig->render($response, 'auth/change.html.twig');
    }

    public function postChangePassword($request, $response)
    { }
}
