<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('news.index', [
            'news' => News::latestPublished()->simplePaginate(10),
        ]);
    }

    /**
     * @param string $slug
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function show(string $slug): View
    {
        $news = News::whereSlug($slug)->firstOrFail();

        return view('news.show', [
            'news' => $news,
        ]);
    }
}
