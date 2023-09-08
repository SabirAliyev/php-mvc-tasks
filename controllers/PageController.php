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

    public function show()
    {
        $title = 'Show';
        return view('pages.details', compact('title'));
    }

    public function error_404()
    {
        $title = '404';
        return view('pages.404', compact('title'));
    }

}