<?php

namespace The5000\Controllers;

use The5000\Models\Account;

class HomeController extends Controller
{
    public function index($request, $response, $args)
    {
        // Account::create([
        //     'email' => 'glg@prout.com',
        //     'pseudo' => 'prout',
        //     'password' => sha1('chatte')
        // ]);
        // $user = Account::all();
        // var_dump($user);
        return $this->twig->render($response, 'home.twig', [
            'name' => 'Michel',
            'now' => date('Y:m:d H:i:s')
        ]);
    }
}