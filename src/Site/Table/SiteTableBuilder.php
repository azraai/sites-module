<?php namespace Anomaly\SitesModule\Site\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class SiteTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SiteTableBuilder extends TableBuilder
{

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'entry.name'      => [
            'heading' => 'anomaly.module.sites::field.name.name',
        ],
        'entry.reference' => [
            'heading' => 'anomaly.module.sites::field.reference.name',
        ],
        'entry.domain'    => [
            'heading' => 'anomaly.module.sites::field.domain.name',
        ],
        'entry.enabled'   => [
            'heading' => 'anomaly.module.sites::field.enabled.name',
            'wrapper' => '<span class="tag tag-{value.context}">{value.status}</span>',
            'value'   => [
                'context' => 'entry.enabled ? "success" : "danger"',
                'status'  => 'entry.enabled ? trans("streams::misc.yes") : trans("streams::misc.no")',
            ],
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
            'name' => 'ASC',
        ],
    ];
}
