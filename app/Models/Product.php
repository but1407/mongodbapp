<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $collection = 'tuanbuts';
    protected $connection = 'mongodb';
    use SoftDeletes;
    protected $fillable = [
        'title',
        'price',
        'product_code',
        'description'
    ];
}