<?php namespace Anomaly\ApplicationsModule\Http\Controller\Admin;

use Anomaly\ApplicationsModule\Application\Form\ApplicationFormBuilder;
use Anomaly\ApplicationsModule\Application\Table\ApplicationTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class ApplicationsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\Streams\Platform\Application\Http\Controller\Admin
 */
class ApplicationsController extends AdminController
{

    /**
     * Return an index of applications.
     *
     * @param ApplicationTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ApplicationTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new application.
     *
     * @param ApplicationFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ApplicationFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing application.
     *
     * @param ApplicationFormBuilder $form
     * @param                        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ApplicationFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
