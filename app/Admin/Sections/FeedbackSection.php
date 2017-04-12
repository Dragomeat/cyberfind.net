<?php

declare(strict_types=1);

namespace App\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use App\Models\Feedback;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class FeedbackSection
 * @package App\Admin\Sections
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
                AdminColumn::link('subject', 'Subject')->setWidth('50px'),
                AdminColumn::text('email', 'Email'),
                AdminColumn::text('is_resolved', 'Resolved'),
                AdminColumn::datetime('created_at', 'Created at')
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
            AdminFormElement::text('subject', 'Subject')->setReadOnly(true),
            AdminFormElement::text('email', 'Email')->setReadOnly(true),
            AdminFormElement::textarea('message', 'Message')->setReadOnly(true),
            AdminFormElement::checkbox('is_resolved', 'Resolved'),
            AdminFormElement::datetime('created_at', 'Created at')->setReadOnly(true)
        );
    }
}