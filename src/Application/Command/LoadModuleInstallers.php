<?php namespace Anomaly\ApplicationsModule\Application\Command;

use Anomaly\Streams\Platform\Addon\Module\Module;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\Streams\Platform\Installer\InstallerCollection;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Console\Kernel;

/**
 * Class LoadModuleInstallers
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule\Application\Command
 */
class LoadModuleInstallers implements SelfHandling
{

    /**
     * The application reference.
     *
     * @var string
     */
    protected $reference;

    /**
     * The installer collection.
     *
     * @var InstallerCollection
     */
    protected $installers;

    /**
     * Create a new LoadModuleInstallers instance.
     *
     * @param InstallerCollection $installers
     * @param string              $reference
     */
    public function __construct(InstallerCollection $installers, $reference)
    {
        $this->reference  = $reference;
        $this->installers = $installers;
    }

    /**
     * Handle the command.
     *
     * @param ModuleCollection $modules
     */
    public function handle(ModuleCollection $modules)
    {
        /* @var Module $module */
        foreach ($modules as $module) {

            if ($module->getNamespace() == 'anomaly.module.installer') {
                continue;
            }

            if ($module->getNamespace() == 'anomaly.module.applications') {
                continue;
            }

            $this->installers->add(
                new Installer(
                    trans('streams::installer.installing', ['installing' => trans($module->getName())]),
                    function (Kernel $console) use ($module) {
                        $console->call(
                            'module:install',
                            [
                                'module' => $module->getNamespace(),
                                '--app'  => $this->reference,
                            ]
                        );
                    }
                )
            );
        }
    }
}
