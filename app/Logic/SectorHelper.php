<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Models\Sector;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class SectorHelper implements BackpackFieldsInterface
{

    use BackpackFieldsTrait;

    const VALIDATION_RULES = [
        'name'=>'required|string|min:3',
    ];

    public static function fields(): Collection
    {
        return collect([
            [
                'type'=>'text',
                'name'=>'name',
                'label'=>'Sector Name',
                'create'=>true,
                'list'=>true,
            ],[
                'type'=>'text',
                'name'=>'source',
                'label'=>'Source',
                'create'=>true,
                'list'=>true
            ],
        ]);
    }

    public static function getSectorIDS(array $form_data){
        $sectors = [];
        foreach ($form_data as $sector)
        {
            $original = $sector;
            $sector = json_decode($sector, true);
            if($sector==null)
            {
                $sectors[]=$original;
            }else if (isset($sector['id'])){
                $sectors[] = $sector['id'];
            } elseif(isset($sector['new']) && $sector['new']==true)
            {
                $sectors[] = (
                    Sector::create([
                        'name'=>$sector['label'],
                        'source'=>'user input',
                    ])
                )->id;
            } elseif(isset($sector['vendor']) && $sector['vendor']=='agrovoc')
            {
                $sectors[] = (
                    Sector::create([
                        'name'=>$sector['label'],
                        'source'=>'agrovoc',
                    ])
                )->id;
            }
        }

        return $sectors;
    }
}
