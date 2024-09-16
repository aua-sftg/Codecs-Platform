<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPMWorks extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'ipmworks';

    protected $guarded = ['_id'];
}
