<?php namespace Anomaly\ApplicationsModule\Application\Form;

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

        $builder->setFormResponse($redirect->to('admin/application/install/' . $builder->getFormValue('reference')));

        $builder->saveForm();
    }
}
