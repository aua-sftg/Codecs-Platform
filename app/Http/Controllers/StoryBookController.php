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
            ]
        ];

        return view('storybooks.storybooks', compact('storybooks'));
    }
}