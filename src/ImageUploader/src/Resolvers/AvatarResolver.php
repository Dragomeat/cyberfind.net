<?php

declare(strict_types=1);

namespace Service\ImageUploader\Resolvers;

use Illuminate\Contracts\Filesystem\Filesystem;

/**
 * Class AvatarResolver.
 */
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

    /**
     * @param string $avatar
     * @return $this
     */
    public function setAvatarPath(string $avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @param ImageResolverInterface $resolver
     * @return $this
     */
    public function setDefaultResolver(ImageResolverInterface $resolver)
    {
        $this->resolver = $resolver;

        return $this;
    }
}
