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
                'order'=>2,
                'gate'=>PermissionHelper::PERMISSION_UPLOAD_DATASETS
            ],[
                'label' => __('Favorites'),
                'url' => route('profile.favorites'),
                'route'=>'profile.favorites',
                'icon' => asset('img/icons/favorite.svg'),
                'group' => 'profile_sidebar',
                'order'=>3
            ],[
                'label' => __('Home'),
                'url' => route('home'),
                'group' => 'footer_navigation',
                'order'=>1
            ],[
                'label' => __('Meta-inventory'),
                'url' => route('meta_inventory_home'),
                'group' => 'footer_navigation',
                'order'=>2
            ],[
                'label' => __('Inventory of datasets'),
                'url' => route('inventory_of_datasets'),
                'group' => 'footer_navigation',
                'order'=>3
            ],[
                'label' => __('Imprints'),
                'url' => route('page.show',['page'=>'imprints']),
                'group' => 'footer_navigation',
                'order'=>4
            ],



            //FOOTER ABOUT LINKS
            [
                'label' => __('About CODECS'),
                'url' => 'https://www.horizoncodecs.eu/',
                'group' => 'footer_about_links',
                'order'=>1
            ],[
                'label' => __('Help'),
                'url' => 'mailto:aua.developers@gmail.com',
                'group' => 'footer_about_links',
                'order'=>2
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

    public static function footer_navigation():Collection
    {
        return self::get('footer_navigation');
    }

    public static function footer_about_links():Collection
    {
        return self::get('footer_about_links');
    }
}
