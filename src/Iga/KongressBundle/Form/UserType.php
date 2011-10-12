<?php

namespace Iga\KongressBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        ;
    }

    public function getName()
    {
        return 'iga_kongressbundle_usertype';
    }
}
