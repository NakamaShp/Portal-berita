<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class DetailnewsController extends Controller
{
    public function show($slug)
    {

        $News = News::where('slug', $slug)->first();
        $newests = News::orderby('created_at', 'desc')->get()->take(4);

        return view('pages.show', compact('news', 'newests'));
    }
}
