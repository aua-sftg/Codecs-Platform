<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Models\Keyword;
use App\Models\Sector;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class KeywordHelper implements BackpackFieldsInterface
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

    public static function getKeywordIDS(array $form_data){
        $keywords = [];
        foreach ($form_data as $keyword)
        {
            $original = $keyword;
            $keyword = json_decode($keyword, true);
            if($keyword==null)
            {
                $keywords[]=$original;
            }else if (isset($keyword['id'])){
                $keywords[] = $keyword['id'];
            } elseif(isset($keyword['new']) && $keyword['new']==true)
            {
                $keywords[] = (
                Keyword::create([
                    'name'=>$keyword['label'],
                    'source'=>'user input',
                ])
                )->id;
            } elseif(isset($keyword['vendor']) && $keyword['vendor']=='agrovoc')
            {
                $keywords[] = (
                Keyword::create([
                    'name'=>$keyword['label'],
                    'source'=>'agrovoc',
                ])
                )->id;
            }
        }

        return $keywords;
    }

}
