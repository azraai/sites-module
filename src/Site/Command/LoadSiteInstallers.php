<?php namespace Anomaly\SitesModule\Site\Command;

use Anomaly\Streams\Platform\Console\Kernel;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\Streams\Platform\Installer\InstallerCollection;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class LoadSiteInstallers
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LoadSiteInstallers
{

    use DispatchesJobs;

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
     * Create a new LoadSiteInstallers instance.
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
     */
    public function handle()
    {
        $this->installers->add(
            new Installer(
                'streams::installer.running_site_migrations',
                function (Kernel $console) {
                    $console->call(
                        'migrate',
                        [
                            '--force' => true,
                            '--app'   => $this->reference,
                            '--path'  => 'vendor/anomaly/streams-platform/migrations/site',
                        ]
                    );
                }
            )
        );
    }
}
