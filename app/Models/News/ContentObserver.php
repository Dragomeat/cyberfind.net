<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 04.04.17
 * Time: 19:04.
 */

namespace App\Models\News;

use App\Models\News;
use Service\ContentRenderer\ContentRendererInterface;

class ContentObserver
{
    /**
     * @var ContentRendererInterface
     */
    private $renderer;

    public function __construct(ContentRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function saving(News $news): void
    {
        if ($news->content_rendered && !$news->content_source) {
            return;
        }
        $rendered = $this->renderer->render((string) $news->content_source);
        $news->content_rendered = (string) $rendered;
    }
}
