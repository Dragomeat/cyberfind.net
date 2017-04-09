<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 10:03.
 */

namespace App\Admin\Sections;

use AdminForm;
use AdminColumn;
use AdminDisplay;
use App\Models\News;
use AdminFormElement;
use App\Models\Tags;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Form\FormElements;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Contracts\Form as FormInterface;
use SleepingOwl\Admin\Contracts\Display as DisplayInterface;

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
        return trans('admin_news.title');
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getCreateTitle()
    {
        return trans('admin_news.create');
    }

    public function getEditTitle()
    {
        return trans('admin_news.edit');
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
                AdminColumn::link('title', 'Title')->setWidth('100px'),
                AdminColumn::text('slug', 'Slug'),
                AdminColumn::text('status', 'Status'),
                AdminColumn::datetime('published_at', 'Published at'),
                AdminColumn::datetime('created_at', 'Created at')
            )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @param bool $create
     * @return FormInterface
     */
    public function onEdit($id, bool $create = false)
    {
        return AdminForm::panel()->addBody(
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::hidden('user_id')->mutateValue(function () {
                 return \Auth::id();
            }),
            AdminFormElement::hidden('status')->mutateValue(function () {
                return 'published';
            }), //TODO
            AdminFormElement::file('illustration', 'Illustration'),
            AdminFormElement::text('slug', 'Slug'),
            AdminFormElement::wysiwyg('content_source', 'Content', 'simplemde')
                ->disableFilter()
                ->required(),
            AdminFormElement::multiselect('tags', 'Tags')
                ->setModelForOptions(Tags::class)
                ->setDisplay('name'),
            AdminFormElement::datetime('published_at', 'Publish news')
                ->setCurrentDate()
        );
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null, true);
    }
}
