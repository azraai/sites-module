<?php namespace Anomaly\ApplicationsModule\Application\Contract;

use Anomaly\ApplicationsModule\Application\ApplicationModel;
use Anomaly\Streams\Platform\Model\Contract\EloquentRepositoryInterface;

/**
 * Interface ApplicationRepositoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule\Application\Contract
 */
interface ApplicationRepositoryInterface extends EloquentRepositoryInterface
{

    /**
     * Find an application by it's reference.
     *
     * @param $reference
     * @return ApplicationModel
     */
    public function findByReference($reference);
}
