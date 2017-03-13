<?php namespace Anomaly\SitesModule\Site\Form;

use Anomaly\SitesModule\Site\Form\Validation\UniqueApplication;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class SiteFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\SitesModule\Site\Form
 */
class SiteFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'name'      => [
            'required'     => true,
            'type'         => 'anomaly.field_type.text',
            'label'        => 'anomaly.module.sites::field.name.name',
            'instructions' => 'anomaly.module.sites::field.name.instructions.sites',
        ],
        'reference' => [
            'required'     => true,
            'disabled'     => 'edit',
            'type'         => 'anomaly.field_type.slug',
            'label'        => 'anomaly.module.sites::field.reference.name',
            'instructions' => 'anomaly.module.sites::field.reference.instructions',
            'rules'        => [
                'unique_application',
            ],
            'validators'   => [
                'unique_application' => [
                    'handler' => UniqueApplication::class,
                    'message' => 'validation.unique',
                ],
            ],
            'config'       => [
                'slugify' => 'name',
            ],
        ],
        'domain'    => [
            'required'     => true,
            'type'         => 'anomaly.field_type.text',
            'label'        => 'anomaly.module.sites::field.domain.name',
            'instructions' => 'anomaly.module.sites::field.domain.instructions.sites',
        ],
        'enabled'   => [
            'type'         => 'anomaly.field_type.boolean',
            'label'        => 'anomaly.module.sites::field.enabled.name',
            'instructions' => 'anomaly.module.sites::field.enabled.instructions',
            'config'       => [
                'default_value' => true,
            ],
        ],
        'username'  => [
            'required'     => true,
            'enabled'      => 'create',
            'type'         => 'anomaly.field_type.slug',
            'label'        => 'anomaly.module.sites::field.username.name',
            'instructions' => 'anomaly.module.sites::field.username.instructions',
        ],
        'email'     => [
            'required'     => true,
            'enabled'      => 'create',
            'type'         => 'anomaly.field_type.email',
            'label'        => 'anomaly.module.sites::field.email.name',
            'instructions' => 'anomaly.module.sites::field.email.instructions',
        ],
        'password'  => [
            'required'     => true,
            'enabled'      => 'create',
            'type'         => 'anomaly.field_type.text',
            'label'        => 'anomaly.module.sites::field.password.name',
            'instructions' => 'anomaly.module.sites::field.password.instructions',
        ],
    ];

    /**
     * Fired before saving the model.
     */
    public function onSaving()
    {
        $this->form->removeField('username');
        $this->form->removeField('password');
        $this->form->removeField('email');
    }
}
