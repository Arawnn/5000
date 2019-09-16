<?php

namespace The5000\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use The5000\Models\Account;

class EmailAvailable extends AbstractRule
{
    public function validate($input)
    {
        return Account::where('email',$input)->count() === 0;
    }
}