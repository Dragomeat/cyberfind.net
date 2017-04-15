<?php

declare(strict_types=1);

namespace App\Admin\Sections;

use AdminForm;
use AdminColumn;
use AdminDisplay;
use AdminFormElement;
use AdminDisplayFilter;
use App\Models\Feedback;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class FeedbackSection.
 */
class FeedbackSection extends Section implements Initializable
{
    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation($priority = 500, function () {
            return Feedback::noResolved()->count();
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-comments';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Обратная связь';
    }

    /**
     * @return string
     */
    public function getEditTitle()
    {
        return 'Просмотр сообщения';
    }

    /**
     * @return \SleepingOwl\Admin\Contracts\Display\DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setFilters(
                AdminDisplayFilter::scope('orderResolved')
                    ->setValue(true)
            )
            ->setColumns(
                AdminColumn::link('subject', 'Тема')->setWidth('50px'),
                AdminColumn::text('email', 'Email'),
                AdminColumn::text('is_resolved', 'Вопрос решён?'),
                AdminColumn::datetime('created_at', 'Создан в')
            )->paginate(20);
    }

    /**
     * @param int $id
     * @param bool $create
     * @return \SleepingOwl\Admin\Contracts\Form\FormInterface
     */
    public function onEdit(int $id, bool $create = false)
    {
        return AdminForm::panel()->addBody(
            AdminFormElement::text('subject', 'Тема')->setReadOnly(true),
            AdminFormElement::text('email', 'Email')->setReadOnly(true),
            AdminFormElement::textarea('message', 'Сообщение')->setReadOnly(true),
            AdminFormElement::checkbox('is_resolved', 'Resolved'),
            AdminFormElement::datetime('created_at', 'Создан в')->setReadOnly(true)
        );
    }
}
