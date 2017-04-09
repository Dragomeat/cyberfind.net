<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 04.04.17
 * Time: 18:58.
 */

namespace App\Models\News;

use App\Models\News;
use Illuminate\Support\Str;

class SlugObserver
{
    /**
     * @param News $news
     */
    public function creating(News $news)
    {
        $news->slug = Str::slug($news->title).'-'.($this->getElementsLastId() + 1);
    }

    /**
     * @return int
     */
    private function getElementsLastId(): int
    {
        $lastNews = News::orderBy('id', 'desc')->first();

        return $lastNews ? $lastNews->id : 0;
    }
}
