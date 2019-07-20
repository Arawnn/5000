<?php

namespace The5000\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model {

    use SoftDeletes;
    protected $table = 'account';
    public $timestamps = false;
    protected $dates = ['deleted_at'];

}