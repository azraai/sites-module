<?php namespace Anomaly\SitesModule\Site\Command;

use Anomaly\Streams\Platform\Addon\Module\Module;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\Streams\Platform\Installer\InstallerCollection;
use Anomaly\Streams\Platform\Console\Kernel;

/**
 * Class LoadModuleSeeders
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LoadModuleSeeders
{

    /**
     * The site reference.
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
     * Create a new LoadModuleSeeders instance.
     *
     * @param InstallerCollection $installers
     * @param                     $reference
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

            $this->installers->add(
                new Installer(
                    trans('streams::installer.seeding', ['seeding' => trans($module->getName())]),
                    function (Kernel $console) use ($module) {
                        $console->call(
                            'db:seed',
                            [
                                '--addon' => $module->getNamespace(),
                                '--app'   => $this->reference,
                                '--force' => true,
                            ]
                        );
                    }
                )
            );
        }
    }

}
