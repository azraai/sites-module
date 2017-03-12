<?php namespace Anomaly\ApplicationsModule\Application\Form;

use Anomaly\ApplicationsModule\Application\ApplicationInstaller;

/**
 * Class ApplicationFormHandler
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule\Application\Form
 */
class ApplicationFormHandler
{

    /**
     * Handle the form.
     *
     * @param ApplicationFormBuilder $builder
     *
     */
    public function handle(ApplicationFormBuilder $builder)
    {
        if (!$builder->canSave()) {
            return;
        }

        (new ApplicationInstaller())->install($builder->getFormValues()->all());

        $builder->saveForm();
    }
}
