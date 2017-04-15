<?php

declare(strict_types=1);

namespace App\Providers;

use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

/**
 * Class AdminSectionsServiceProvider.
 */
class AdminSectionsServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $sections = [
        \App\Models\User::class => \App\Admin\Sections\UsersSection::class,
        \App\Models\News::class => \App\Admin\Sections\NewsSection::class,
        \App\Models\Tags::class => \App\Admin\Sections\TagsSection::class,
        \App\Models\Feedback::class => \App\Admin\Sections\FeedbackSection::class,
        \App\Models\Tournament::class => \App\Admin\Sections\TournamentsSection::class,
    ];

    /**
     * @param Admin $admin
     */
    public function boot(Admin $admin)
    {
        parent::boot($admin);
    }
}
