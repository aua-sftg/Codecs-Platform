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
                'cover' => 'img/storybooks/cover_pecorino.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/c331dc22a6.html',
            ],
            [
                'id' => 2,
                'title' => 'Experimental Farm in Agricultural University of Athens',
                'cover' => 'img/storybooks/cover_greek.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/bd237038a0.html',
            ],
            [
                'id' => 3,
                'title' => 'Living Lab Smart Villages Network, Slovenia',
                'cover' => 'img/storybooks/cover_slovenia.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/4d2b00ac8a.html',
            ],
            [
                'id' => 4,
                'title' => 'Living Lab RAMAS, North Macedonia',
                'cover' => 'img/storybooks/RAMAS.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/968440a0cc.html',
            ],
            [
                'id' => 5,
                'title' => 'Living Lab LIT OUESTEREL',
                'cover' => 'img/storybooks/ouesterel.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/a84443174b.html',
            ],
            [
                'id' => 6,
                'title' => 'Living Lab Agrifood Technology',
                'cover' => 'img/storybooks/agrifood.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/ae093285e1.html',
            ],
            [
                'id' => 7,
                'title' => 'Living Lab Greenhouse Smart Sensor Technology, Serbia',
                'cover' => 'img/storybooks/serbia.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/1c159f381b.html',
            ]
        ];

        return view('storybooks.storybooks', compact('storybooks'));
    }
}