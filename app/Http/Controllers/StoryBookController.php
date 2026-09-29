<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryBookController extends Controller
{
    public function index() {
        $storybooks = [
            [
                'id' => 1,
                'title' => 'Consorzio Pecorino Toscano',
                'cover' => 'img/storybooks/toscano_italy_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/5b8da7ac40.html',
            ],
            [
                'id' => 2,
                'title' => 'Experimental Farm in Agricultural University of Athens',
                'cover' => 'img/storybooks/athens_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/8958f1e1f4.html',
            ],
            [
                'id' => 3,
                'title' => 'Living Lab Smart Villages Network, Slovenia',
                'cover' => 'img/storybooks/slovenia_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/83c8a147a0.html',
            ],
            [
                'id' => 4,
                'title' => 'Living Lab RAMAS, North Macedonia',
                'cover' => 'img/storybooks/n_macedonia.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/ef18454598.html',
            ],
            [
                'id' => 5,
                'title' => 'Living Lab LIT OUESTEREL',
                'cover' => 'img/storybooks/ouesterel_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/c116e12154.html',
            ],
            [
                'id' => 6,
                'title' => 'Living Lab Agrifood Technology Belgium',
                'cover' => 'img/storybooks/belgium_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/58d768076a.html',
            ],
            [
                'id' => 7,
                'title' => 'Living Lab Greenhouse Smart Sensor Technology, Serbia',
                'cover' => 'img/storybooks/serbia_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/d58e2a865c.html',
            ],
            [
                'id' => 8,
                'title' => 'Occitanum Open Lab Viticulture, France',
                'cover' => 'img/storybooks/occitanum_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/d16d7ea9d4.html',
            ],
            [
                'id' => 9,
                'title' => 'Occitanum Open Lab Sheep, France',
                'cover' => 'img/storybooks/occitanum_sheep.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/46175c9b0f.html',
            ],
            [
                'id' => 10,
                'title' => 'Grassland Management, Estonia',
                'cover' => 'img/storybooks/grassland_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/78193e9342.html',
            ],
            [
                'id' => 11,
                'title' => 'Scottish Farms and Digital Platforms',
                'cover' => 'img/storybooks/scottish_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/3b0fb9c474.html',
            ],
            [
                'id' => 12,
                'title' => 'Innovative Soil Scanner, Hungary',
                'cover' => 'img/storybooks/hungarycover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/f5ee7ab789.html',
            ],
            [
                'id' => 13,
                'title' => 'Living Lab Almeria Agroecology, Spain',
                'cover' => 'img/storybooks/almeria_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/c71ce777ae.html',
            ],
            [
                'id' => 14,
                'title' => 'Local Beef Cattle Farming, Latvia',
                'cover' => 'img/storybooks/latvia_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/17012898f5.html',
            ],
            [
                'id' => 15,
                'title' => 'Organic Table Grapes, Italy',
                'cover' => 'img/storybooks/grapes_italy_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/202496f0be.html',
            ],
            [
                'id' => 16,
                'title' => 'Agri-Digital Bildung, Germany',
                'cover' => 'img/storybooks/bildung_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/5b2c6b2286.html',
            ],
            [
                'id' => 17,
                'title' => 'Living Lab Appetit, Poland',
                'cover' => 'img/storybooks/apetit_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/b6ab53fa9b.html',
            ],
            [
                'id' => 18,
                'title' => 'Cloughjordan Food Hub, Ireland',
                'cover' => 'img/storybooks/ireland_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/697c1d6736.html',
            ],
            [
                'id' => 19,
                'title' => 'Artificial Irrigation Management Systems, Slovakia',
                'cover' => 'img/storybooks/slovakia_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/e83d4442b8.html',
            ],
            [
                'id' => 20,
                'title' => 'Automation of Orchard Management, Czech Republic',
                'cover' => 'img/storybooks/orchard_cover.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/81ee12877c.html',
            ]
        ];

        return view('storybooks.storybooks', compact('storybooks'));
    }
}