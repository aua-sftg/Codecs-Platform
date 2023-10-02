<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class PagesHelper implements BackpackFieldsInterface
{

    use BackpackFieldsTrait;

    const VALIDATION_RULES = [
        'title' => 'required|min:3|max:255',
        'body'=>'required|min:3',
    ];

    public static function fields(): Collection
    {
        return collect([
            [
                'type'=>'text',
                'name'=>'title',
                'label'=>'Title',
                'create'=>true,
                'list'=>true,
            ],[   // Text
                'name'  => 'slug',
                'target'  => 'title',
                'label' => "Slug",
                'type'  => 'slug',
                'create'=>true,
                'list'=>true,
            ],[   // Summernote
                'name'  => 'body',
                'label' => 'Body',
                'type'  => 'ckeditor',
//                'options' => [],
                'create'=>true,
            ],
        ]);
    }
}
