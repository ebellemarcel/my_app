<?php

namespace App\Form;

use App\Entity\Photo;
use App\Entity\Propriete;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('filename', FileType::class, [
                'label' => 'Photo',
                'required' => false,
            ])
            ->add('propriete', EntityType::class, [
                'class' => Propriete::class,
                'choice_label' => 'titre', 
            ])
			->add('principale', ChoiceType::class, [
                'choices' => [
                    'Yes' => '1',
                    'No' => '0',
                ],
            ])
	
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }
}