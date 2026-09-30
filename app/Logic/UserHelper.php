<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Models\Favorite;
use App\Models\Permission;
use App\Models\User;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class UserHelper implements BackpackFieldsInterface
{
    use BackpackFieldsTrait;
    const ROLE_ADMIN = 'administrator';
    const ROLE_DATASET_FEEDER = 'dataset_feeder';
    const ROLE_DATASET_EDITOR = 'dataset_editor';

    public static function fields(): Collection
    {
        return collect([
            [
                'name'=>'name',
                'label'=>'Full name of the user',
                'type'=>'text',
                'create'=>true,
                'list'=>true,
            ],[
                'name'=>'email',
                'label'=>'Email of the user',
                'type'=>'text',
                'create'=>true,
                'list'=>true,
            ],[   // Checklist
                'label'     => 'Permissions',
                'type'      => 'checklist',
                'name'      => 'permissions',
                'entity'    => 'permissions',
                'attribute' => 'name',
                'model'     => "\App\Models\Permission",
                'create'=>true,
            ],[
                'name'     => 'permissionsStr',
                'label'    => 'Permissions',
                'type'     => 'text',
                'list'=>true
            ]
        ]);
    }

    public static function hasFavorite(User $user,string $collection, string $collection_id):bool
    {
        return $user->favorites()->where('collection',$collection)->where('collection_id',$collection_id)->count()>0;
    }

    public static function attachFavorite(User $user, string $collection, string $collection_id): Favorite
    {
        return $user->favorites()->create([
            'collection'=>$collection,
            'collection_id'=>$collection_id,
        ]);
    }

    public static function detachFavorite(User $user, string $collection, string $collection_id):bool
    {
        return $user->favorites()->where('collection',$collection)->where('collection_id',$collection_id)->delete();
    }
}
