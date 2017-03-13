<?php namespace Anomaly\SitesModule\Site\Form\Validation;

use Anomaly\Streams\Platform\Application\ApplicationRepository;

/**
 * Class UniqueApplication
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UniqueApplication
{

    /**
     * Handle the validation.
     *
     * @param ApplicationRepository $applications
     * @param                       $value
     */
    public function handle(ApplicationRepository $applications, $value)
    {
        if ($applications->findByReference($value)) {
            return false;
        }

        return true;
    }
}
