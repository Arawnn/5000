<?php

namespace The5000\Auth;

use The5000\Models\Account;

class Auth
{

    public function user()
    {
        if(isset($_SESSION['user']))
        {
            return Account::find($_SESSION['user']);
        }
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }
    public function connect($email, $password)
    {
        $account = Account::where('email', $email)->first();
        var_dump($account);
        if(!$account)
        {
            return false;
        }

        if(password_verify($password, $account->password))
        {
            $_SESSION['user'] = $account->id;

            return true;
        }

        return false;
    }

    public function logout()
    {
        if(isset($_SESSION['user']))
        {
            unset($_SESSION['user']);
        }
    }
}