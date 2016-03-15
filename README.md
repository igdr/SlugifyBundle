Slugify Bundle
========================
Installation
------------

Add the bundle to your `composer.json`:

    composer require igdr/slugify-bundle

and run:

    php composer.phar update

Then add the SlugifyBundle to your application kernel:

    // app/IgdrKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Igdr\Bundle\SlugifyBundle\IgdrSlugifyBundle(),
            // ...
        );
    }
