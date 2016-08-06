<?php namespace Anomaly\ApplicationsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class ApplicationsModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule
 */
class ApplicationsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/applications'                       => 'Anomaly\ApplicationsModule\Http\Controller\Admin\ApplicationsController@index',
        'admin/applications/create'                => 'Anomaly\ApplicationsModule\Http\Controller\Admin\ApplicationsController@create',
        'admin/applications/edit/{id}'             => 'Anomaly\ApplicationsModule\Http\Controller\Admin\ApplicationsController@edit',
        'admin/applications/install/{application}' => 'Anomaly\ApplicationsModule\Http\Controller\Admin\InstallerController@install',
        'admin/applications/seed/{application}'    => 'Anomaly\ApplicationsModule\Http\Controller\Admin\InstallerController@seed',
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\ApplicationsModule\Application\Contract\ApplicationRepositoryInterface' => 'Anomaly\ApplicationsModule\Application\ApplicationRepository',
    ];
}
