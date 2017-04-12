<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class AboutController
 * @package App\Http\Controllers
 */
class AboutController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function about(): View
    {
        return view('about.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function partners(): View
    {
        return view('about.partners');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function contacts(): View
    {
        return view('about.contacts');
    }

    /**
     * @param FeedbackRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function feedback(FeedbackRequest $request): RedirectResponse
    {
        Feedback::create(
            $request->only([
                'name',
                'subject',
                'email',
                'message',
            ])
        );

        return redirect()->back()->with('status', [
            'message' => 'Форма отправлена!',
            'type' => 'success',
        ]);
    }
}
