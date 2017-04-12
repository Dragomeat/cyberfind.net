<?php

declare(strict_types=1);

namespace App\Composers;

use Illuminate\View\View;
use Illuminate\Contracts\Session\Session;

class MessageComposer
{
    /**
     * @var Session
     */
    private $session;

    /**
     * TODO Govnokod!!!
     * @var array
     */
    private $statusTypes = [
        'success' => 'border-color: green; color: green;',
        'error' => 'border-color: red; color: red;',
    ];

    /**
     * MessageComposer constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $status = $this->session->get('status');

        if ($status !== null && is_array($status)) {
            if (!array_key_exists($status['type'], $this->statusTypes)) {
                return;
            }

            $view->with('status', [
                'style' => $this->statusTypes[$status['type']],
                'message' => $status['message'],
            ]);
        }
    }
}
