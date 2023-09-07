<?php

namespace App\Controllers;

class PageController
{
    public function index()
    {
        // Set a page title.
        $title = 'Home';

        // Load up the view.
        return view('pages.index', compact('title'));
    }

    public function add()
    {
        $title = 'Add';
        return view('pages.add', compact('title'));
    }

}