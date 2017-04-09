<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Contracts\Filesystem\Filesystem;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
     * @param UpdateProfileRequest $request *
     * @param Filesystem $fs
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request, Filesystem $fs, $id)
    {
        /**
         * @var User
         */
        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        $fields = $request->only([
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

        $user->save();

        return redirect()->back();
    }
}
