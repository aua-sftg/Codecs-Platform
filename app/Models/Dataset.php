<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsToMany;

class Dataset extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $connection= 'mongodb';

    protected $collection = 'datasets';
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

    public function audiences():BelongsToMany
    {
        return $this->belongsToMany(Audience::class, null, 'dataset_ids', 'audience_ids');
    }

    public function data_formats():BelongsToMany
    {
        return $this->belongsToMany(DataFormat::class, null, 'dataset_ids', 'data_format_ids');
    }

    public function organization():BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id', '_id');
    }

    public function sector():BelongsToMany
    {
        return $this->belongsToMany(Sector::class, null, 'dataset_ids', 'sector_ids');
    }

    public function keywords():BelongsToMany
    {
        return $this->belongsToMany(Keyword::class, null, 'dataset_ids', 'keyword_ids');
    }

    public function uploadedBy():BelongsTo
    {
        return $this->belongsTo(User::class,'uploaded_by','_id');
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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setFileAttribute($value)
    {
        $attribute_name = "file";
        $disk = "datasets";
        $destination_path = "/";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);
    }
}
