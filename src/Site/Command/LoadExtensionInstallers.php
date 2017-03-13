<?php namespace Anomaly\SitesModule\Site\Command;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\Streams\Platform\Installer\InstallerCollection;
use Anomaly\Streams\Platform\Console\Kernel;

/**
 * Class LoadExtensionInstallers
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LoadExtensionInstallers
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
     * Create a new LoadExtensionInstallers instance.
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
                    trans('streams::installer.installing', ['installing' => trans($extension->getName())]),
                    function (Kernel $console) use ($extension) {
                        $console->call(
                            'extension:install',
                            [
                                'extension' => $extension->getNamespace(),
                                '--app'     => $this->reference,
                            ]
                        );
                    }
                )
            );
        }
    }
}
