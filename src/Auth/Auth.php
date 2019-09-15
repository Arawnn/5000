<?php

namespace The5000\Auth;

use The5000\Models\Account;

class Auth
{
    public function connect($pseudo, $password)
    {
        $account = Account::where('pseudo', $pseudo)->first();

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
}