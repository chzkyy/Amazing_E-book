<?php

namespace App\Http\Controllers;

use App\Models\EBook;

class EBookController extends Controller
{
    public function getBook($id)
    {
        return view('pages.book-detail',[
            'title' => 'Book Detail',
            'ebook' => EBook::findOrfail($id),
        ]);
    }
}
