<?php namespace Anomaly\SitesModule\Site;

use Anomaly\SitesModule\Site\Contract\SiteRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentRepository;

/**
 * Class SiteRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SiteRepository extends EloquentRepository implements SiteRepositoryInterface
{

    /**
     * The repository model.
     *
     * @var SiteModel
     */
    protected $model;

    /**
     * Create a new SiteRepository instance.
     *
     * @param SiteModel $model
     */
    public function __construct(SiteModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find an site by it's reference.
     *
     * @param $reference
     * @return SiteModel
     */
    public function findByReference($reference)
    {
        return $this->model->where('reference', $reference)->first();
    }
}
