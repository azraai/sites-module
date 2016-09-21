<?php namespace Anomaly\ApplicationsModule\Application\Command;

use Anomaly\Streams\Platform\Console\Kernel;
use Anomaly\Streams\Platform\Installer\Installer;
use Anomaly\Streams\Platform\Installer\InstallerCollection;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class LoadApplicationInstallers
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class LoadApplicationInstallers
{

    use DispatchesJobs;

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
     * Create a new LoadApplicationInstallers instance.
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
                'streams::installer.running_application_migrations',
                function (Kernel $console) {
                    $console->call(
                        'migrate',
                        [
                            '--force' => true,
                            '--app'   => $this->reference,
                            '--path'  => 'vendor/anomaly/streams-platform/migrations/application',
                        ]
                    );
                }
            )
        );
    }
}
