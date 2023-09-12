<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class InvDuplicates extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'duplicates';

    protected $guarded = ['_id'];
}
