<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\Emprunt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('livre', EntityType::class, [
                'class' => Livre::class,
                'choice_label' => 'titre',
                'choice_name' => Choicelist::fieldName($this, "titre"),
                'choice_value' => Choicelist::value($this, "id"),
                'multiple' => false,
                'expanded' => false

            ])
            ->add('dateSortie', HiddenType::class, ['mapped' => false])
            ->add('dateRend', HiddenType::class, ['mapped' => false]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
