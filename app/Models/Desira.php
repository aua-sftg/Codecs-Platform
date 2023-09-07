<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Desira extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'desira';

    protected $guarded = ['_id'];
}
