<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Smartakis extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'smartakis';

    protected $guarded = ['_id'];
}
