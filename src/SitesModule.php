<?php namespace Anomaly\SitesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class SitesModule
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SitesModule
 */
class SitesModule extends Module
{

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-globe';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'sites'   => [
            'buttons' => [
                'new_site',
            ],
        ],
        'domains' => [
            'buttons' => [
                'add_domain',
            ],
        ],
    ];

}
