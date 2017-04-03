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

class Users extends Section implements Initializable
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
                AdminFormElement::text('login', trans('admin_users.fields.login'))->required(),
                AdminFormElement::text('email', trans('admin_users.fields.email'))->required()
                    ->unique()
                    ->setVisibilityCondition(function ($model) use ($create) {
                        return false;
                    }),
                AdminFormElement::password('password', trans('admin_users.fields.password'))->required()
                    ->setVisibilityCondition(function ($model) use ($create) {
                        return $create;
                    }),
                AdminFormElement::password('password_confirmation', trans('admin_users.fields.password_confirmation'))
                    ->setValueSkipped(true)
                    ->setVisibilityCondition(function ($model) use ($create) {
                        return $create;
                    })
                    ->required()
                    ->addValidationRule('same:password', 'Passwords must match!'),
                AdminFormElement::checkbox('is_confirmed', trans('admin_users.fields.is_confirmed')),
                AdminFormElement::select('role', trans('admin_users.fields.role'), [
                    'user' => 'User',
                    'moderator' => 'Moderator',
                    'administrator' => 'Administrator',
                    'chief' => 'Cheif',
                ]),
                AdminFormElement::checkbox('send_password', trans('admin_users.fields.send_mail'))
                    ->setVisibilityCondition(function ($model) use ($create) {
                        return $create;
                    }),
            ]),
            trans('admin_users.tabs.additional') => new FormElements([
                AdminFormElement::text('age', trans('admin_users.fields.age')),
                AdminFormElement::select('gender', trans('admin_users.fields.gender.title'), [
                    'male' => trans('admin_users.fields.gender.male'),
                    'female' => trans('admin_users.fields.gender.female'),
                ]),
                AdminFormElement::text('first_name', trans('admin_users.fields.first_name')),
                AdminFormElement::text('last_name', trans('admin_users.fields.last_name')),
                AdminFormElement::text('middle_name', trans('admin_users.fields.middle_name')),
                AdminFormElement::select('country', trans('admin_users.fields.country.title'), [
                    'ru' => trans('admin_users.fields.country.ru'),
                    'ua' => trans('admin_users.fields.country.ua'),
                    'us' => trans('admin_users.fields.country.us'),
                    'cn' => trans('admin_users.fields.country.cn'),
                ]),
                AdminFormElement::text('city', trans('admin_users.fields.city')),
                AdminFormElement::textarea('about', trans('admin_users.fields.about')),
            ]),
            trans('admin_users.tabs.contacts') => new FormElements([
                AdminFormElement::text('skype', trans('admin_users.fields.skype')),
                AdminFormElement::text('telephone', trans('admin_users.fields.telephone')),
            ]),
            trans('admin_users.tabs.privacy') => new FormElements([
                AdminFormElement::checkbox('show_email', trans('admin_users.fields.show_email')),
            ]),
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
