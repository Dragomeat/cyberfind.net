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
use App\Models\User;
use AdminFormElement;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Form\FormElements;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Contracts\Form as FormInterface;
use SleepingOwl\Admin\Contracts\Display as DisplayInterface;

class UsersSection extends Section implements Initializable
{
    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation($priority = 500, function () {
            return User::count();
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-users';
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getTitle()
    {
        return trans('admin_users.title');
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getCreateTitle()
    {
        return trans('admin_users.create');
    }

    public function getEditTitle()
    {
        return trans('admin_users.edit');
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
                AdminColumn::link('login', 'Login')->setWidth('100px'),
                AdminColumn::text('email', 'Email')
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
        $tabs = AdminDisplay::tabbed()->setElements([
            trans('admin_users.tabs.general') => new FormElements([
                AdminFormElement::text('login', trans('fields.login'))->required(),
                AdminFormElement::text('email', trans('fields.email'))->required()
                    ->unique()
                    ->setVisibilityCondition(function ($model) use ($create) {
                        return false;
                    }),
                AdminFormElement::password('password', trans('fields.password'))->required()
                    ->setVisibilityCondition(function ($model) use ($create) {
                        return $create;
                    }),
                AdminFormElement::password('password_confirmation', trans('fields.password_confirmation'))
                    ->setValueSkipped(true)
                    ->setVisibilityCondition(function ($model) use ($create) {
                        return $create;
                    })
                    ->required()
                    ->addValidationRule('same:password', 'Passwords must match!'),
                AdminFormElement::checkbox('is_confirmed', trans('fields.is_confirmed')),
                AdminFormElement::select('role', trans('fields.role'), [
                    'user' => 'User',
                    'moderator' => 'Moderator',
                    'administrator' => 'Administrator',
                    'chief' => 'Cheif',
                ]),
//                AdminFormElement::checkbox('send_password', trans('fields.send_mail'))
//                    ->setVisibilityCondition(function ($model) use ($create) {
//                        return $create;
//                    }),
            ]),
            trans('admin_users.tabs.additional') => new FormElements([
                AdminFormElement::text('age', trans('fields.age')),
                AdminFormElement::select('gender', trans('fields.gender.title'), [
                    'male' => trans('fields.gender.male'),
                    'female' => trans('fields.gender.female'),
                ]),
                AdminFormElement::text('first_name', trans('fields.first_name')),
                AdminFormElement::text('last_name', trans('fields.last_name')),
                AdminFormElement::text('middle_name', trans('fields.middle_name')),
                AdminFormElement::select('country', trans('fields.country.title'), [
                    'ru' => trans('fields.country.ru'),
                    'ua' => trans('fields.country.ua'),
                    'us' => trans('fields.country.us'),
                    'cn' => trans('fields.country.cn'),
                ]),
                AdminFormElement::text('city', trans('fields.city')),
                AdminFormElement::textarea('about', trans('fields.about')),
            ]),
            trans('admin_users.tabs.contacts') => new FormElements([
                AdminFormElement::text('skype', trans('fields.skype')),
                AdminFormElement::text('telephone', trans('fields.telephone')),
            ]),
//            trans('admin_users.tabs.privacy') => new FormElements([
//                AdminFormElement::checkbox('show_email', trans('fields.show_email')),
//            ]),
        ]);

        return AdminForm::panel()->addBody($tabs);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null, true);
    }
}
