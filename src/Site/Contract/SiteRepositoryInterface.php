<?php namespace Anomaly\SitesModule\Site\Contract;

use Anomaly\SitesModule\Site\SiteModel;
use Anomaly\Streams\Platform\Model\Contract\EloquentRepositoryInterface;

/**
 * Interface SiteRepositoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SitesModule\Site\Contract
 */
interface SiteRepositoryInterface extends EloquentRepositoryInterface
{

    /**
     * Find an site by it's reference.
     *
     * @param $reference
     * @return SiteModel
     */
    public function findByReference($reference);
}
