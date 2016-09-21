<?php namespace Anomaly\ApplicationsModule\Http\Controller\Admin;

use Anomaly\ApplicationsExtension\Application\Command\LoadExtensionSeeders;
use Anomaly\ApplicationsModule\Application\Command\LoadApplicationInstallers;
use Anomaly\ApplicationsModule\Application\Command\LoadExtensionInstallers;
use Anomaly\ApplicationsModule\Application\Command\LoadModuleInstallers;
use Anomaly\ApplicationsModule\Application\Command\LoadModuleSeeders;
use Anomaly\ApplicationsModule\Application\Contract\ApplicationRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\Streams\Platform\Installer\InstallerCollection;
use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Container\Container;

/**
 * Class InstallerController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule\Http\Controller\Admin
 */
class InstallerController extends AdminController
{

    /**
     * Run installation.
     *
     * @param CacheManager                   $cache
     * @param ApplicationRepositoryInterface $applications
     * @param                                $reference
     * @return \Illuminate\View\View
     */
    public function install(CacheManager $cache, ApplicationRepositoryInterface $applications, $reference)
    {
        $application = $applications->findByReference($reference);

        $cache->store()->flush();

        $action = 'install';

        $installers = new InstallerCollection();

        $this->dispatch(new LoadApplicationInstallers($installers, $reference));
        $this->dispatch(new LoadModuleInstallers($installers, $reference));
        $this->dispatch(new LoadExtensionInstallers($installers, $reference));

        return $this->view->make(
            'anomaly.module.applications::process',
            compact(
                'action',
                'installers',
                'application'
            )
        );
    }

    /**
     * Finish installation.
     *
     * @param CacheManager $cache
     * @return \Illuminate\View\View
     */
    public function finish(
        CacheManager $cache,
        ApplicationRepositoryInterface $applications,
        $reference
    ) {
        $application = $applications->findByReference($reference);

        $cache->store()->flush();

        $action = 'finish';

        $installers = new InstallerCollection();

        $this->dispatch(new LoadModuleSeeders($installers, $reference));
        $this->dispatch(new LoadExtensionSeeders($installers, $reference));

        return $this->view->make(
            'anomaly.module.applications::process',
            compact(
                'action',
                'installers',
                'application'
            )
        );
    }

    /**
     * Run an installation command.
     *
     * @param Container $container
     * @param           $reference
     * @param           $key
     * @return bool
     */
    public function run(Container $container, $reference, $key)
    {
        $installers = new InstallerCollection();

        $this->dispatch(new LoadApplicationInstallers($installers, $reference));
        $this->dispatch(new LoadModuleInstallers($installers, $reference));
        $this->dispatch(new LoadExtensionInstallers($installers, $reference));

        /* @var Installer $installer */
        $installer = $installers->get($key);

        $container->call($installer->getTask());

        return 'true';
    }

    /**
     * Run an installation command.
     *
     * @param Container  $container
     * @param            $reference
     * @param            $key
     * @return bool
     */
    public function seed(Container $container, $reference, $key)
    {
        $installers = new InstallerCollection();

        putenv('INSTALLED=false');

        $this->dispatch(new LoadModuleSeeders($installers, $reference));
        $this->dispatch(new LoadExtensionSeeders($installers, $reference));

        /* @var Installer $installer */
        $installer = $installers->get($key);

        $container->call($installer->getTask());

        return 'true';
    }
}
