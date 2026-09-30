<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;

class AssessmentTool extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'assessmenttools';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function organization():BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id', '_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getCreatedByAttribute()
    {
        return $this->user->name??'n.a';
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "assessmenttools";
        $destination_path = "/";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);
    }

    public function setFileAttribute($value)
    {
        if(is_string($value)){
            $this->attributes['file']=$value;
        }else{
            $attribute_name = "file";
            $disk = "assessmenttools";
            $destination_path = "/";

            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);
        }
    }
}
