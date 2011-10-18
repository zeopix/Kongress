<?php

namespace Navis\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('direction')
            ->add('city')
            ->add('postalCode')

        ;
    }

    public function getName()
    {
        return 'navis_userbundle_companytype';
    }
}
