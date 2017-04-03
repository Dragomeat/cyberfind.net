<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\UpdateProfileRequest;

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
         * @var User $user
         */
        $user = User::findOrFail($id);

        return view('profile.index', [
            'user' => $user
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
         * @var User $user
         */
        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    /**
     * @param UpdateProfileRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        /**
         * @var User $user
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
            'telephone'
        ]);

        foreach ($fields as $key => $value) {
            if ($user->$key !== $value) {
                $user->$key = $value;
            }
        }

        $user->save();

        return redirect()->back();
    }
}
