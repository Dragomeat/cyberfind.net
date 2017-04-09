<?php
/**
 * Created by PhpStorm.
 * User: norton
 * Date: 04.04.17
 * Time: 13:56
 */

namespace Service\ImageUploader\Resolvers;

use Illuminate\Contracts\Filesystem\Filesystem;

class AvatarResolver implements ImageResolverInterface
{
    /**
     * @var string
     */
    private $avatar;

    /**
     * @var ImageResolverInterface
     */
    private $resolver;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * AvatarResolver constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @return string
     */
    public function resolve(): string
    {
        exit($this->avatar);

        return $this->filesystem->exists($this->avatar)
            ? $this->avatar
            : $this->resolver->resolve();
    }

    public function setAvatarPath(string $avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function setDefaultResolver(ImageResolverInterface $resolver)
    {
        $this->resolver = $resolver;

        return $this;
    }
}