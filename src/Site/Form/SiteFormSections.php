<?php namespace Anomaly\SitesModule\Site\Form;

class SiteFormSections
{

    public function handle(SiteFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'tabs' => [
                        'website' => [
                            'title'  => 'anomaly.module.sites::form.website',
                            'fields' => [
                                'name',
                                'reference',
                                'domain',
                                'enabled',
                            ],
                        ],
                    ],
                ],
            ]
        );

        if ($builder->getFormMode() == 'create') {
            $builder->addSectionTab(
                'general',
                'administration',
                [
                    'title'  => 'anomaly.module.sites::form.administrator',
                    'fields' => [
                        'username',
                        'email',
                        'password',
                    ],
                ]
            );
        }
    }
}
