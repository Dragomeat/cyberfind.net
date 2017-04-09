<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $sections = [
        \App\Models\User::class => \App\Admin\Sections\UsersSection::class,
        \App\Models\News::class => \App\Admin\Sections\NewsSection::class,
        \App\Models\Tags::class => \App\Admin\Sections\TagsSection::class,
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        //

        parent::boot($admin);
    }
}
