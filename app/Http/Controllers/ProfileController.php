<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Profile\UpdateRequest;
use Illuminate\Contracts\Filesystem\Filesystem;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        /**
         * @var User
         */
        $user = User::findOrFail($id);

        return view('profile.index', [
            'user' => $user,
            'countries' => User\Country::getAll(),
            'gender' => User\Gender::getAll(),
            'vkProfile' => $user->vkontakteUrl,
            'fbProfile' => $user->facebookUrl,
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(int $id)
    {
        /**
         * @var User
         */
        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        return view('profile.edit', [
            'user' => $user,
            'countries' => User\Country::getAll(),
            'gender' => User\Gender::getAll(),
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Filesystem $fs
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateRequest $request, Filesystem $fs, int $id)
    {
        /**
         * @var User
         */
        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        $fields = $request->intersect([
            'login',
            'first_name',
            'last_name',
            'middle_name',
            'age',
            'country',
            'city',
            'gender',
            'about',
            'skype',
            'telephone',
        ]);

        foreach ($fields as $key => $value) {
            if ($user->$key !== $value) {
                $user->$key = $value;
            }
        }

//        if ($request->get('avatar', 'off') === 'on') {
//            $oldAvatar =  $user->avatar ?: public_path('static/avatars/' .$user->avatar);
//
//            if ($fs->exists($oldAvatar)) {
//                $fs->delete(
//                    $oldAvatar
//                );
//            }
//
//            $user->avatar = null;
//            $user->avatar_rendered = false;
//        }

        if ($user->save()) {
            return redirect()->back();
        }

        return redirect()->back()->with([
            'status' => [
                'message' => 'Произошла неизвестная ошибка! Мы уже с ней разбираемся :)',
                'type' => 'error',
            ],
        ]);
    }
}
