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
                'iframe_url' => 'https://heyzine.com/flip-book/b8490ab038.html',
            ],
            [
                'id' => 2,
                'title' => 'Experimental Farm in Agricultural University of Athens',
                'cover' => 'img/storybooks/cover_greek.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/7eba608198.html',
            ],
            [
                'id' => 3,
                'title' => 'Living Lab Smart Villages Network, Slovenia',
                'cover' => 'img/storybooks/cover_slovenia.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/25e4fef9cd.html',
            ],
        ];

        return view('storybooks.storybooks', compact('storybooks'));
    }
}