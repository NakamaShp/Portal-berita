<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Banner;

class NewsController extends Controller
{
    public function index()
    {

        $news = News::all();
        $banners = Banner::all();
        $featureds = News::where('is_featured', true)->get();
        return view('pages.news', compact('news', 'banners', 'featureds'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        $newests = News::orderby('created_at', 'desc')->get()->take(4);

        return view('pages.show', compact('news', 'newests'));
    }
}
