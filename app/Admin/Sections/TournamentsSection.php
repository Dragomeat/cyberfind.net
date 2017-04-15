<?php

declare(strict_types=1);

namespace App\Admin\Sections;

use App\Models\Tournament;
use SleepingOwl\Admin\Factories\DisplayColumnFactory;
use SleepingOwl\Admin\Factories\DisplayFactory;
use SleepingOwl\Admin\Factories\FormElementFactory;
use SleepingOwl\Admin\Factories\FormFactory;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Contracts\Form as FormInterface;

/**
 * Class TournamentsSection
 * @package App\Admin\Sections
 */
class TournamentsSection extends Section implements Initializable
{
    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation($priority = 500, function () {
            return Tournament::count();
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-bolt';
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getTitle()
    {
        return 'Турниры';
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getCreateTitle()
    {
        return 'Создание турнира';
    }

    public function getEditTitle()
    {
        return 'Редактирование турнира';
    }


    public function onDisplay(DisplayFactory $displayFactory, DisplayColumnFactory $columnFactory)
    {
        return $displayFactory->table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                $columnFactory->text('id', '#')->setWidth('30px'),
                $columnFactory->image('logotype', 'Логотип соревнования'),
                $columnFactory->link('title', 'Заголовок'),
                $columnFactory->text('organizer', 'Организатор'),
                $columnFactory->datetime('holding_at', 'День проведения'),
                $columnFactory->datetime('created_at', 'Создан'),
            ])->paginate(20);
    }


    /**
     * @param FormFactory $formFactory
     * @param FormElementFactory $elementFactory
     * @param int $id
     * @param bool $create
     * @return FormInterface\FormInterface
     */
    public function onEdit(FormFactory $formFactory, FormElementFactory $elementFactory, int $id, bool $create = false)
    {
        return $formFactory->panel()->addBody([
            $elementFactory->text('title', 'Заголовок')->required(),
            $elementFactory->file('logotype', 'Логотип')->required(),
            $elementFactory->text('organizer', 'Организатор')->required(),
            $elementFactory->text('link', 'Ссылка')->required(),
            $elementFactory->wysiwyg('description', 'Description', 'simplemde')
                ->disableFilter()
                ->required(),
            $elementFactory->select('type', 'Тип турнира', [
                'pro' => 'Профессиональный',
                'amateur' => 'Любительский',
            ])->required(),

            $elementFactory->text('prize_fund', 'Призовой фонд')
                ->setDefaultValue(0)
                ->required(),
            $elementFactory->text('entrance_fee', 'Вступительный взнос')
                ->setDefaultValue(0)
                ->required(),

            $elementFactory->date('holding_at', 'День проведения')
                ->setFormat('Y-m-d'),

            $elementFactory->date('qualification_at', 'День квалификации')
                ->setFormat('Y-m-d'),
        ]);
    }

    /**
     * @return FormInterface\FormInterface
     */
    public function onCreate()
    {
        return $this->app->call([$this, 'onEdit'], [
            'id' => 0,
            'create' => true,
        ]);
    }
}
