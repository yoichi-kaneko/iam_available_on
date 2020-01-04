<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function howto()
    {
        return view('page/howto');
    }

    public function termsofservice()
    {
        return view('page/termsofservice');
    }
}
