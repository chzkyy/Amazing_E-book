<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        return view('pages.index',[
            'title' => 'Index Page',
        ]);
    }
    public function getHome()
    {
        return view('pages.home',[
            'title'  => 'Home',
            'ebooks' => EBook::all()
        ]);
    }
}
