<?php namespace Anomaly\SitesModule\Domain\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class DomainTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DomainTableBuilder extends TableBuilder
{

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'entry.domain'           => [
            'heading' => 'anomaly.module.sites::field.domain.name',
        ],
        'entry.application.name' => [
            'heading' => 'anomaly.module.sites::field.application.name',
        ],
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
        'view' => [
            'href'   => 'http://{entry.domain}',
            'target' => '_blank',
        ],
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete',
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'order_by' => [
            'domain' => 'ASC',
        ],
    ];
}
