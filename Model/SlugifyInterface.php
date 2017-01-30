<?php

namespace Igdr\Bundle\SlugifyBundle\Model;

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
    public function setSlug(string $slug = null);

    /**
     * @return string
     */
    public function getSlug(): ?string;

    /**
     * @return string
     */
    public function getSlugify(): string;
}
