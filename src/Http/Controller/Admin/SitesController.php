<?php namespace Anomaly\SitesModule\Http\Controller\Admin;

use Anomaly\SitesModule\Site\Form\SiteFormBuilder;
use Anomaly\SitesModule\Site\Table\SiteTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SitesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\Streams\Platform\Site\Http\Controller\Admin
 */
class SitesController extends AdminController
{

    /**
     * Return an index of sites.
     *
     * @param SiteTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SiteTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new site.
     *
     * @param SiteFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(SiteFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing site.
     *
     * @param SiteFormBuilder        $form
     * @param                        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(SiteFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
