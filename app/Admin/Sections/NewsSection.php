<?php

declare(strict_types=1);

namespace App\Admin\Sections;

use AdminForm;
use AdminColumn;
use AdminDisplay;
use App\Models\News;
use App\Models\Tags;
use AdminFormElement;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Contracts\Form as FormInterface;
use SleepingOwl\Admin\Contracts\Display as DisplayInterface;

/**
 * Class NewsSection.
 */
class NewsSection extends Section implements Initializable
{
    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation($priority = 500, function () {
            return News::count();
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-newspaper-o';
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getTitle()
    {
        return 'Новости';
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getCreateTitle()
    {
        return 'Новая новость';
    }

    public function getEditTitle()
    {
        return 'Редактирование новости';
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->with('user')
            ->with('tags')
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('title', 'Заголовок')->setWidth('100px'),
                AdminColumn::text('slug', 'Слаг'),
                AdminColumn::text('status', 'Статус'),
                AdminColumn::datetime('published_at', 'Опубликовано в'),
                AdminColumn::datetime('created_at', 'Создано в')
            )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @param bool $create
     * @return FormInterface
     */
    public function onEdit(int $id, bool $create = false)
    {
        return AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Заголовок')->required(),
            AdminFormElement::hidden('user_id')->mutateValue(function () {
                return \Auth::id();
            }),
            AdminFormElement::hidden('status')->mutateValue(function () {
                return 'published';
            }), //TODO
            AdminFormElement::file('illustration', 'Иллюстрация'),
            AdminFormElement::text('slug', 'Слаг (генерируется автоматически)'),
            AdminFormElement::wysiwyg('content_source', 'Контент', 'simplemde')
                ->disableFilter()
                ->required(),
            AdminFormElement::multiselect('tags', 'Тэги')
                ->setModelForOptions(Tags::class)
                ->setDisplay('name'),
            AdminFormElement::datetime('published_at', 'Когда опубликовать новость?')
                ->setCurrentDate()
        );
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(0, true);
    }
}
