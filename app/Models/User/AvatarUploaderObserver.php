<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 03.04.17
 * Time: 10:38.
 */

namespace App\Models\User;

use App\Models\User;
use App\Jobs\UploadAvatarProcess;
use Illuminate\Contracts\Bus\Dispatcher;

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

    public function created(User $user)
    {
        if ($user->hasAvatar()) {
            return;
        }

        $this->dispatcher->dispatch(new UploadAvatarProcess($user));
    }
}
