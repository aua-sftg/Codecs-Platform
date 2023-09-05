<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Fairshare extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'fairshare';

    protected $guarded = ['_id'];
}
