<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Loginmongodb extends Eloquent
{
    use HasFactory;
    protected $connection = "mongodb";
    protected $collection = "loginmongodb";
    use SoftDeletes;
    protected $fillable = [
        'name','password','token'
    ];

}