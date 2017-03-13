<?php namespace Anomaly\SitesModule\Site\Form;

use Anomaly\SitesModule\Site\SiteInstaller;
use Anomaly\Streams\Platform\Message\MessageBag;

/**
 * Class SiteFormHandler
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SitesModule\Site\Form
 */
class SiteFormHandler
{

    /**
     * Handle the form.
     *
     * @param SiteFormBuilder $builder
     *
     */
    public function handle(SiteFormBuilder $builder, MessageBag $messages)
    {
        if (!$builder->canSave()) {
            return;
        }

        if ($builder->getFormMode() == 'create') {

            (new SiteInstaller())->install($builder->getFormValues()->all());

            $messages->info(
                trans(
                    'anomaly.module.sites::message.install_site',
                    [
                        'reference' => $builder->getFormValue('reference'),
                    ]
                )
            );
        }

        $builder->saveForm();
    }
}
