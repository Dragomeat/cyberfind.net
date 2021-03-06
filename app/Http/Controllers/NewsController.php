<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

/**
 * Class NewsController.
 */
class NewsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
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
    public function show(string $slug)
    {
        $news = News::whereSlug($slug)->firstOrFail();

        return view('news.show', [
            'news' => $news,
        ]);
    }

    public function tag(int $tag)
    {
        $tag = (int) $tag;

        return view('news.index', [
            'news' => News::whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', '=', $tag);
            })->latestPublished()->simplePaginate(10),
        ]);
    }
}
