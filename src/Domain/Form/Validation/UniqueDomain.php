<?php namespace Anomaly\SitesModule\Domain\Form\Validation;

use Anomaly\SitesModule\Domain\DomainRepository;
use Anomaly\SitesModule\Domain\Form\DomainFormBuilder;

/**
 * Class UniqueDomain
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UniqueDomain
{

    /**
     * Handle the validation.
     *
     * @param DomainFormBuilder     $builder
     * @param DomainRepository      $domains
     * @param                       $value
     * @return bool
     */
    public function handle(DomainFormBuilder $builder, DomainRepository $domains, $value)
    {
        $entry  = $builder->getFormEntry();
        $domain = $domains->findByDomain($value);

        if ($domain && $domain->getId() !== $entry->getId()) {
            return false;
        }

        return true;
    }
}
