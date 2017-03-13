<?php namespace Anomaly\SitesModule\Domain;

use Anomaly\SitesModule\Domain\Contract\DomainRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentRepository;

/**
 * Class DomainRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DomainRepository extends EloquentRepository implements DomainRepositoryInterface
{

    /**
     * The repository model.
     *
     * @var DomainModel
     */
    protected $model;

    /**
     * Create a new DomainRepository instance.
     *
     * @param DomainModel $model
     */
    public function __construct(DomainModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a domain.
     *
     * @param $domain
     * @return DomainModel
     */
    public function findByDomain($domain)
    {
        return $this->model->where('domain', $domain)->first();
    }
}
