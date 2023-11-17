<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

 

            ->add('user_nom', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Nom :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ]
            ])


            ->add('user_prenom', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Prenom :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ]
            ])


            ->add('email', EmailType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'E-mail :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'constraints' => [
                    new Assert\Email(),
                    new Assert\Unique([
                        'fields' => 'email',
                        'message' =>"{{ value }} est déjà utilisé !"
                ]),
                ],
            ])


            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Mot de passe :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'constraints' => [new Assert\Regex(
                    pattern: "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/",
                    message: 'Le mot de passe doit contenir au moins 8 caractères (Au moins une majuscule, une minuscule et un chiffre)',
                )]
            ])


            ->add('user_tel', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '8',
                    'maxlength' => '15'
                ],
                'label' => 'Télephone :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ]
            ])

            ->add('user_adresse', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Adresse :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ]
            ])


            ->add('user_adresseville', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Ville :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ]
            ])

            ->add('user_adressecp', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Code postal :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ]
            ])


            ->add('user_sexe',  ChoiceType::class, [
                'attr' => ['class' => 'form-select form-select-lg mb-5'],
                'label' => 'Sélectionner le genre: ',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'placeholder' => false,

                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                    'Homme' => 'H',
                    'Femme' => 'F',
                ],
            ])

            ->add('user_type',  ChoiceType::class, [
                'attr' => ['class' => 'form-select form-select-lg mb-5'],
                'label' => 'Sélectionner le type: ',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'placeholder' => false,

                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                    'Particulier' => 'Particulier',
                    'Professionnel' => 'Professionnel',
                ],
            ])



            
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success mt-3'
                ],
                'label' => 'Ajouter',
            ]);
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            //'data_class' => User::class,
        ]);
    }
}
