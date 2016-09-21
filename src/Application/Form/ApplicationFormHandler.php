<?php namespace Anomaly\ApplicationsModule\Application\Form;

use Anomaly\ApplicationsModule\Application\ApplicationInstaller;
use Illuminate\Routing\Redirector;

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
     * @param Redirector             $redirect
     */
    public function handle(ApplicationFormBuilder $builder, Redirector $redirect)
    {
        if (!$builder->canSave()) {
            return;
        }

        (new ApplicationInstaller())->install($builder->getFormValues()->all());

        $builder->setFormResponse(
            $redirect->to(
                'http://' . $builder->getFormValue('domain') . '/applications/install/' . $builder->getFormValue(
                    'reference'
                )
            )
        );

        $builder->saveForm();
    }
}
