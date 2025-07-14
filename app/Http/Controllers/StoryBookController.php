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
                'title' => 'Second Storybook',
                'cover' => 'img/storybooks/cover_pecorino.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/c6c01db582.html',
            ],
            [
                'id' => 3,
                'title' => 'Third Storybook',
                'cover' => 'img/storybooks/cover_pecorino.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/b8490ab038.html',
            ],
            [
                'id' => 4,
                'title' => 'Fourth Storybook',
                'cover' => 'img/storybooks/cover_pecorino.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/c6c01db582.html',
            ],
            [
                'id' => 5,
                'title' => 'Fifth Storybook',
                'cover' => 'img/storybooks/cover_pecorino.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/c6c01db582.html',
            ],
            [
                'id' => 6,
                'title' => 'Fifth Storybook',
                'cover' => 'img/storybooks/cover_pecorino.jpg',
                'iframe_url' => 'https://heyzine.com/flip-book/c6c01db582.html',
            ],
        ];

        return view('storybooks.storybooks', compact('storybooks'));
    }
}