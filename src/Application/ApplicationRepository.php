<?php namespace Anomaly\ApplicationsModule\Application;

use Anomaly\ApplicationsModule\Application\Contract\ApplicationRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class ApplicationRepository
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule\Application
 */
class ApplicationRepository extends EloquentRepository implements ApplicationRepositoryInterface
{

    /**
     * The repository model.
     *
     * @var ApplicationModel
     */
    protected $model;

    /**
     * Create a new ApplicationRepository instance.
     *
     * @param ApplicationModel $model
     */
    public function __construct(ApplicationModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find an application by it's reference.
     *
     * @param $reference
     * @return ApplicationModel
     */
    public function findByReference($reference)
    {
        return $this->model->where('reference', $reference)->first();
    }
}
