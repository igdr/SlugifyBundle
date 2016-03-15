<?php

namespace App\Bundle\SlugifyBundle\Slugify;

/**
 * Interface SlugifyInterface.
 */
interface SlugifyInterface
{
    /**
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug($slug);

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return string
     */
    public function getSlugify();
}