<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Commercial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserEditType extends AbstractType
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
                ],
                'constraints' => [
                    new Assert\NotBlank(
                        message: 'Cette valeur ne doit pas être vide.',
                    ),
                    new Assert\Length(min:2, max:50,
                        minMessage: 'Votre Nom doit comporter au moins {{ 2 }} caractères',
                        maxMessage: 'Votre Nom ne peut pas contenir plus de {{ 50 }} caractères',
                    ),
                    new Assert\Regex(
                        pattern: "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð][a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
                        message: '-- Format incorrect -- Format accepté : d\'abord au moins une lettre et ensuite (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
                    ),
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
                ],
                'constraints' => [
                    new Assert\NotBlank(
                        message: 'Cette valeur ne doit pas être vide.',
                    ),
                    new Assert\Length(min:2, max:50,
                        minMessage: 'Votre Nom doit comporter au moins {{ 2 }} caractères',
                        maxMessage: 'Votre Nom ne peut pas contenir plus de {{ 50 }} caractères',
                    ),
                    new Assert\Regex(
                        pattern: "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð][a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
                        message: '-- Format incorrect -- Format accepté : d\'abord au moins une lettre et ensuite (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
                    ),
                ]
            ])


            ->add('email', EmailType::class,[
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'E-mail :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'constraints' => [
                    new Assert\Email(
                        message: 'L\'e-mail "{{ value }}" n\'est pas un e-mail valide.',
                    )
                ],
            ])


            ->add('user_tel', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Télephone :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'constraints' => [
                    new Assert\NotBlank(
                        message: 'Cette valeur ne doit pas être vide.',
                    ),
                    new Assert\Regex(
                        pattern: "/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/",
                        message: 'Le numéro du téléphone "{{ value }}" n\'est pas un numéro du téléphone valide.',
                    )
                ]
            ])

            ->add('user_adress', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Adresse :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'constraints' => [
                    new Assert\NotBlank(
                        message: 'Cette valeur ne doit pas être vide.',
                    ),
                    new Assert\Length(min:5, max:255,
                        minMessage: 'Votre adresse doit comporter au moins {{ 5 }} caractères',
                        maxMessage: 'Votre adresse ne peut pas contenir plus de {{ 255 }} caractères',
                    ),
                    new Assert\Regex(
                        pattern: "/^[a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
                        message: '-- Format incorrect -- Format accepté : (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
                    )
                ]
            ])


            ->add('user_adresseville', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Ville :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'constraints' => [
                    new Assert\NotBlank(
                        message: 'Cette valeur ne doit pas être vide.',
                    ),
                    new Assert\Length(min:5, max:50,
                        minMessage: 'Le nom de la ville doit comporter au moins {{ 5 }} caractères',
                        maxMessage: 'Le nom de la ville ne peut pas contenir plus de {{ 50 }} caractères',
                    ),
                    new Assert\Regex(
                        pattern: "/^[a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
                        message: '-- Format incorrect -- Format accepté : (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
                    )
                ]
            ])

            ->add('user_adressecp', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Code postal :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'constraints' => [
                    new Assert\NotBlank(
                        message: 'Cette valeur ne doit pas être vide.',
                    ),
                    new Assert\Regex(
                        pattern: "/^\d{5}$/",
                        message: 'La valeur du code postal doit être composée de 5 chiffres.',
                    )
                ]    
            ])


            ->add('user_sexe',  ChoiceType::class, [
                'attr' => ['class' => 'form-select form-select-lg mb-5 CrudSelect'],
                'label' => 'Sélectionner le genre : ',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
                'placeholder' => false,

                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                    'Homme' => 'h',
                    'Femme' => 'f',
                ],
                'constraints' => [
                    new Assert\Choice(['h', 'f']),
                ]
            ])

            ->add('user_type',  ChoiceType::class, [
                'attr' => ['class' => 'form-select form-select-lg mb-5 CrudSelect'],
                'label' => 'Sélectionner le type : ',
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
                'constraints' => [
                    new Assert\Choice(['Particulier', 'Professionnel']),
                ]
            ])

            ->add('user_pays', EntityType::class, [
                'attr' => ['class' => 'form-select form-select-lg mb-5 CrudSelect'],
                'class' => Pays::class,
                'label' => 'Sélectionner le pays :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
            
                'choice_label' => 'pays_nom',
                'placeholder' => false,
                'choice_attr' => ['class' => 'justify-content-center'],
            ])
            
            ->add('user_commerc', EntityType::class, [
                'attr' => ['class' => 'form-select form-select-lg mb-5 CrudSelect'],
                'class' => Commercial::class,
                'label' => 'Sélectionner le commercial :',
                'label_attr' => [
                    'class' => 'form-label mt-4 d-flex justify-content-center'
                ],
            
                'choice_label' => 'commerc_nom',
                'placeholder' => false,
                'choice_attr' => ['class' => 'justify-content-center'],
            ])

            
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success mt-3'
                ],
                'label' => 'Modifier',
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
