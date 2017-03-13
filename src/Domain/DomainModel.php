<?php namespace Anomaly\SitesModule\Domain;

use Anomaly\SitesModule\Site\SiteModel;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class DomainModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DomainModel extends EloquentModel
{

    /**
     * The model connection.
     *
     * @var string
     */
    protected $connection = 'core';

    /**
     * The model table.
     *
     * @var string
     */
    protected $table = 'applications_domains';

    /**
     * Return the application relation.
     *
     * @return BelongsTo
     */
    public function application()
    {
        return $this->belongsTo(SiteModel::class);
    }
}
