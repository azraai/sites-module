<?php namespace Anomaly\ApplicationsModule\Application;

use Anomaly\Streams\Platform\Support\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class ApplicationInstaller
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ApplicationInstaller
{

    use DispatchesJobs;

    /**
     * Install the system.
     *
     * @param  array $parameters
     * @return bool
     */
    public function install(array $parameters)
    {
        $data = new Collection();

        $data->put('APP_ENV', 'local');
        $data->put('INSTALLED', 'false');
        $data->put('APP_KEY', str_random(32));

        $data->put('APPLICATION_NAME', '"' . $parameters['name'] . '"');
        $data->put('APPLICATION_DOMAIN', $parameters['domain']);
        $data->put('APPLICATION_REFERENCE', $parameters['reference']);
        $data->put('APP_URL', 'http://' . $parameters['domain']);

        $contents = '';

        foreach ($data as $key => $value) {
            if ($key) {
                $contents .= strtoupper($key) . '=' . $value . PHP_EOL;
            } else {
                $contents .= $value . PHP_EOL;
            }
        }

        if (!is_dir(base_path('resources/' . $parameters['reference']))) {
            mkdir(base_path('resources/' . $parameters['reference']));
        }

        file_put_contents(base_path('resources/' . $parameters['reference'] . '/.env'), $contents);
    }
}
