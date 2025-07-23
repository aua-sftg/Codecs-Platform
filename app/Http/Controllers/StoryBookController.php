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
        ];

        return view('storybooks.storybooks', compact('storybooks'));
    }
}