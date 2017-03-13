<?php namespace Anomaly\SitesModule\Domain\Form;

use Anomaly\SitesModule\Domain\Form\Validation\UniqueDomain;
use Anomaly\SitesModule\Site\SiteModel;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class DomainFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SitesModule\Domain\Form
 */
class DomainFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'domain'         => [
            'required'     => true,
            'type'         => 'anomaly.field_type.text',
            'label'        => 'anomaly.module.sites::field.domain.name',
            'instructions' => 'anomaly.module.sites::field.domain.instructions.domains',
            'rules'        => [
                'unique_domain',
            ],
            'validators'   => [
                'unique_domain' => [
                    'handler' => UniqueDomain::class,
                    'message' => 'validation.unique',
                ],
            ],
        ],
        'application_id' => [
            'required'     => true,
            'type'         => 'anomaly.field_type.relationship',
            'label'        => 'anomaly.module.sites::field.application.name',
            'instructions' => 'anomaly.module.sites::field.application.instructions',
            'config'       => [
                'related'    => SiteModel::class,
                'title_name' => 'name',
            ],
        ],
    ];
}
