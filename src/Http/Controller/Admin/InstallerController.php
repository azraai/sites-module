<?php namespace Anomaly\ApplicationsModule\Http\Controller\Admin;

use Anomaly\InstallerModule\Installer\Command\GetInstallers;
use Anomaly\InstallerModule\Installer\Command\GetSeeders;
use Anomaly\Streams\Platform\Application\Command\LoadEnvironmentOverrides;
use Anomaly\Streams\Platform\Application\Command\ReloadEnvironmentFile;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Installer\Console\Command\LocateApplication;
use Anomaly\Streams\Platform\Installer\Console\Command\SetDatabasePrefix;
use Anomaly\Streams\Platform\Installer\Event\StreamsHasInstalled;
use Anomaly\Streams\Platform\Installer\Installer;
use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;

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
     * @param CacheManager $cache
     * @return \Illuminate\View\View
     */
    public function install(CacheManager $cache)
    {
        $cache->store()->flush();

        $this->dispatch(new ReloadEnvironmentFile());
        $this->dispatch(new LoadEnvironmentOverrides());
        $this->dispatch(new SetDatabasePrefix());
        $this->dispatch(new LocateApplication());

        $action = 'install';

        $installers = $this->dispatch(new GetInstallers());

        return view('anomaly.module.installer::process', compact('action', 'installers'));
    }

    /**
     * Finish installation.
     *
     * @param Dispatcher   $events
     * @param CacheManager $cache
     * @return \Illuminate\View\View
     */
    public function finish(Dispatcher $events, CacheManager $cache)
    {
        $cache->store()->flush();

        $action = 'finish';

        $installers = $this->dispatch(new GetSeeders());

        $events->fire(new StreamsHasInstalled($installers));

        return view('anomaly.module.installer::process', compact('action', 'installers'));
    }

    /**
     * Run an installation command.
     *
     * @param Container  $container
     * @param            $key
     * @return bool
     */
    public function run(Container $container, $key)
    {
        $installers = $this->dispatch(new GetInstallers());

        /* @var Installer $installer */
        $installer = $installers->get($key);

        $container->call($installer->getTask());

        return 'true';
    }

    /**
     * Run an installation command.
     *
     * @param Container  $container
     * @param Dispatcher $events
     * @param            $key
     * @return bool
     */
    public function seed(Container $container, Dispatcher $events, $key)
    {
        $installers = $this->dispatch(new GetSeeders());

        $events->fire(new StreamsHasInstalled($installers));

        /* @var Installer $installer */
        $installer = $installers->get($key);

        $container->call($installer->getTask());

        return 'true';
    }
}
