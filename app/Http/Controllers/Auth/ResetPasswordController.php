<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * ResetPasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @param null $token
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null): View
    {
        return view('auth.passwords.reset')->with([
                'token' => $token,
                'email' => $request->get('email'),
            ]
        );
    }
}
