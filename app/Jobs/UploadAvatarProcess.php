<?php

namespace App\Jobs;

use App\Models\User;
use Psr\Log\LoggerInterface;
use Illuminate\Bus\Queueable;
use Intervention\Image\ImageManager;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Service\ImageUploader\AvatarUploader;
use Service\ImageUploader\Gates\FileSize;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Filesystem\Factory as Storage;

class UploadAvatarProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const MAX_AVATAR_FILE_SIZE = 1000 * 1000 * 20;

    /**
     * @var User
     */
    private $user;

    /**
     * UploadAvatarProcess constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(ImageManager $manager, Storage $storage, LoggerInterface $logger)
    {
        $accepted = function (string $path) use ($logger) {
            $this->user->update([
                'avatar' => $path,
                'avatar_rendered' => true,
            ]);

            $logger->info('Queue: Update avatar for user '.$this->user->login);
        };

        $rejected = function (\Throwable $err) use ($logger) {
            $logger->error($err);
        };

        (new AvatarUploader($this->user, $manager))
            ->satisfy(new FileSize(self::MAX_AVATAR_FILE_SIZE))
            ->withSize(165, 165)
            ->upload($storage->disk('avatars'))
            ->then($accepted, $rejected);
    }
}
