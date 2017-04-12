<?php

declare(strict_types=1);

namespace App\Models\News;

use App\Models\News;
use Service\ContentRenderer\ContentRendererInterface;

/**
 * Class ContentObserver.
 */
class ContentObserver
{
    /**
     * @var ContentRendererInterface
     */
    private $renderer;

    /**
     * ContentObserver constructor.
     * @param ContentRendererInterface $renderer
     */
    public function __construct(ContentRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param \App\Models\News $news
     */
    public function saving(News $news)
    {
        if ($news->content_rendered && !$news->content_source) {
            return;
        }

        $rendered = $this->renderer->render((string) $news->content_source);
        $news->content_rendered = (string) $rendered;
    }
}
