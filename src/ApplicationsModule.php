<?php namespace Anomaly\ApplicationsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class ApplicationsModule
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule
 */
class ApplicationsModule extends Module
{

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'applications' => [
            'buttons' => [
                'new_application',
            ],
        ],
    ];

}
