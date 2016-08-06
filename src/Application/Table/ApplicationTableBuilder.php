<?php namespace Anomaly\ApplicationsModule\Application\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class ApplicationTableBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule\Application\Table
 */
class ApplicationTableBuilder extends TableBuilder
{

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'entry.name'      => [
            'heading' => 'anomaly.module.applications::field.name.name'
        ],
        'entry.reference' => [
            'heading' => 'anomaly.module.applications::field.reference.name'
        ],
        'entry.domain'    => [
            'heading' => 'anomaly.module.applications::field.domain.name'
        ],
        'entry.enabled'   => [
            'heading' => 'anomaly.module.applications::field.enabled.name',
            'wrapper' => '<span class="label label-{value.context}">{value.status}</span>',
            'value'   => [
                'context' => 'entry.enabled ? "success" : "danger"',
                'status'  => 'entry.enabled ? trans("streams::addon.enabled") : trans("streams::addon.disabled")'
            ]
        ],
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'edit',
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'order_by' => [
            'name' => 'ASC'
        ]
    ];
}
