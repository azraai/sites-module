<?php namespace Anomaly\ApplicationsModule\Application\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ApplicationFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ApplicationsModule\Application\Form
 */
class ApplicationFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'name'      => [
            'required' => true,
            'type'     => 'anomaly.field_type.text',
            'label'    => 'anomaly.module.applications::field.name.name',
        ],
        'reference' => [
            'required' => true,
            'disabled' => 'edit',
            'type'     => 'anomaly.field_type.slug',
            'label'    => 'anomaly.module.applications::field.reference.name',
            'config'   => [
                'slugify' => 'name',
            ],
        ],
        'domain'    => [
            'required' => true,
            'type'     => 'anomaly.field_type.text',
            'label'    => 'anomaly.module.applications::field.domain.name',
        ],
        'enabled'   => [
            'required' => true,
            'type'     => 'anomaly.field_type.boolean',
            'label'    => 'anomaly.module.applications::field.enabled.name',
        ],
    ];
}
