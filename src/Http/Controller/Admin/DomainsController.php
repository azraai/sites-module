<?php namespace Anomaly\SitesModule\Http\Controller\Admin;

use Anomaly\SitesModule\Domain\Form\DomainFormBuilder;
use Anomaly\SitesModule\Domain\Table\DomainTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class DomainsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\Streams\Platform\Site\Http\Controller\Admin
 */
class DomainsController extends AdminController
{

    /**
     * Return an index of domains.
     *
     * @param DomainTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(DomainTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new domain.
     *
     * @param DomainFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(DomainFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing domain.
     *
     * @param DomainFormBuilder      $form
     * @param                        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(DomainFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
