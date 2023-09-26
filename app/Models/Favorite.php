<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Favorite extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'favorites';
    protected $guarded = ['_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
