<?php

namespace App\Form\Type;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserRolesType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $choices = User::getRolesChoices();
        $resolver->setDefaults(
            [
                'choices' => $choices,
                'expanded' => true,
                'multiple' => true,
            ]
        );
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
