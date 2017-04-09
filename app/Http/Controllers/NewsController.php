<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => News::latestPublished()->simplePaginate(10)
        ]);
    }

    public function show(string $slug)
    {
        $news = News::whereSlug($slug)->firstOrFail();


        return view('news.show', [
           'news' => $news
        ]);
    }
}
