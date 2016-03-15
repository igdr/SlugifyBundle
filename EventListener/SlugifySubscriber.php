<?php

namespace Igdr\Bundle\SlugifyBundle\EventListener;

use Igdr\Bundle\SlugifyBundle\Model\SlugifyInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Igdr\Bundle\SlugifyBundle\Service\SlugifyService;

/**
 * Check entities with SlugifyInterface and generate slug if it is not empty.
 */
class SlugifySubscriber implements EventSubscriber
{
    /**
     * @var SlugifyService
     */
    private $slugify;

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            Events::preUpdate,
            Events::prePersist,
        );
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->generateSlug($args);
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $this->generateSlug($args);
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function generateSlug(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof SlugifyInterface) {
            $slug = $entity->getSlug();
            if (empty($slug)) {
                $entity->setSlug($this->slugify->slugify($entity->getSlugify()));
            }
        }
    }

    /**
     * @param \Igdr\Bundle\SlugifyBundle\Service\SlugifyService $slugify
     */
    public function setSlugify(SlugifyService $slugify)
    {
        $this->slugify = $slugify;
    }
}
