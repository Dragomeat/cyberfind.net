<?php

declare(strict_types=1);

namespace App\Models\User;

use App\Models\User;
use App\Jobs\UploadAvatarProcess;
use Illuminate\Contracts\Bus\Dispatcher;

/**
 * Class AvatarUploaderObserver
 * @package App\Models\User
 */
class AvatarUploaderObserver
{
    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * AvatarUploaderObserver constructor.
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function saved(User $user)
    {
        if ($user->hasAvatar()) {
            return;
        }

        $this->dispatcher->dispatch(new UploadAvatarProcess($user));
    }
}
