<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FeedbackRequest;

/**
 * Class AboutController.
 */
class AboutController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function partners()
    {
        return view('about.partners');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function contacts()
    {
        return view('about.contacts');
    }

    /**
     * @param FeedbackRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function feedback(FeedbackRequest $request)
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
