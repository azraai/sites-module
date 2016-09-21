<?php namespace Anomaly\ApplicationsExtension\Application\Command;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\Streams\Platform\Installer\InstallerCollection;
use Illuminate\Contracts\Console\Kernel;

/**
 * Class LoadExtensionSeeders
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsExtension\Application\Command
 */
class LoadExtensionSeeders
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
     * Create a new LoadExtensionSeeders instance.
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
     * @param ExtensionCollection $extensions
     */
    public function handle(ExtensionCollection $extensions)
    {
        /* @var Extension $extension */
        foreach ($extensions as $extension) {

            if ($extension->getNamespace() == 'anomaly.extension.installer') {
                continue;
            }

            $this->installers->add(
                new Installer(
                    trans('streams::installer.seeding', ['seeding' => trans($extension->getName())]),
                    function (Kernel $console) use ($extension) {
                        $console->call(
                            'db:seed',
                            [
                                '--addon'     => $extension->getNamespace(),
                                '--reference' => $this->reference,
                                '--force'     => true,
                            ]
                        );
                    }
                )
            );
        }
    }

}
