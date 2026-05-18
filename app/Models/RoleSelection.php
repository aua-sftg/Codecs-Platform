<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Jenssegers\Mongodb\Eloquent\Model;

class RoleSelection extends Model
{
    use CrudTrait;

    protected $connection = 'mongodb';
    protected $collection = 'role_selections';
    protected $guarded = ['_id'];
}
