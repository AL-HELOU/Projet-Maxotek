<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categ_libelle', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Libelle :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ]
            ])

            
            ->add('categ_photo', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Photo :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ]
            ])

            ->add('categ_princip', EntityType::class, [
                'attr' => ['class' => 'form-select form-select-lg mb-5 CrudSelect'],
                'class' => Categorie::class,
                'label' => 'Sélectionner la categorie Principale (facultative):',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
            
                'choice_label' => 'categ_libelle',
                'placeholder' => 'Sélectionner la categorie',
                'choice_attr' => ['class' => 'justify-content-center'],
            ])


            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success mt-3'
                ],
                'label' => 'Ajouter',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}
