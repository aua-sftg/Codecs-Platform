<?php

namespace App\Logic;

use Illuminate\Support\Collection;

class LinkList
{
    public static function pool():Collection
    {
        return collect([
            [
                'label' => __('My profile'),
                'route'=>'profile.edit',
                'icon' => asset('img/icons/account_circle.svg'),
                'group' => 'profile_sidebar',
                'order'=>1
            ],[
                'label' => __('My Uploads'),
                'url' => route('datasets.index'),
                'route'=>'datasets.index',
                'icon' => asset('img/icons/account_circle.svg'),
                'group' => 'profile_sidebar',
                'order'=>2
            ],[
                'label' => __('Favorites'),
                'url' => route('profile.favorites'),
                'route'=>'profile.favorites',
                'icon' => asset('img/icons/favorite.svg'),
                'group' => 'profile_sidebar',
                'order'=>3
            ],
        ]);
    }

    public static function get(string $group):Collection
    {
        return self::pool()->where('group',$group)->sortBy('order');
    }

    public static function profile_sidebar():Collection
    {
        return self::get('profile_sidebar');
    }
}
