<?php namespace Anomaly\SitesModule;

use Anomaly\SitesModule\Site\Contract\SiteRepositoryInterface;
use Anomaly\SitesModule\Site\SiteRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class SitesModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SitesModule
 */
class SitesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        SiteRepositoryInterface::class => SiteRepository::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/sites'                   => 'Anomaly\SitesModule\Http\Controller\Admin\SitesController@index',
        'admin/sites/create'            => 'Anomaly\SitesModule\Http\Controller\Admin\SitesController@create',
        'admin/sites/edit/{id}'         => 'Anomaly\SitesModule\Http\Controller\Admin\SitesController@edit',
        'admin/sites/domains'           => 'Anomaly\SitesModule\Http\Controller\Admin\DomainsController@index',
        'admin/sites/domains/create'    => 'Anomaly\SitesModule\Http\Controller\Admin\DomainsController@create',
        'admin/sites/domains/edit/{id}' => 'Anomaly\SitesModule\Http\Controller\Admin\DomainsController@edit',
    ];
}
