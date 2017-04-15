<?php

declare(strict_types=1);

namespace App\Admin\Sections;

use AdminForm;
use AdminColumn;
use AdminDisplay;
use App\Models\Tags;
use AdminFormElement;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Contracts\Form as FormInterface;
use SleepingOwl\Admin\Contracts\Display as DisplayInterface;

/**
 * Class TagsSection.
 */
class TagsSection extends Section implements Initializable
{
    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation($priority = 500, function () {
            return Tags::count();
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-tags';
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getTitle()
    {
        return 'Тэги для новостей';
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getCreateTitle()
    {
        return 'Новый тэг';
    }

    public function getEditTitle()
    {
        return 'Редактирование тэга';
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('name', 'Имя тэга')
            )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit(int $id)
    {
        return AdminForm::panel()->addBody(
            AdminFormElement::text('name', 'Имя тэга')->required()
        );
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(0);
    }
}
