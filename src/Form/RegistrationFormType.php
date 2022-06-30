<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'required' => true,
                'label' => "Email",
                'attr' => [
                    'autocomplete' => 'email',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Mettez un email',
                    ]),
                ],
            ])
            ->add('prenom', TextType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'required' => true,
                'label' => "Prénom",
                'attr' => [
                    'autocomplete' => 'prenom',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Mettez un prénom',
                    ]),
                ],
                ])
                ->add('nom', TextType::class, [
                    // instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'required' => true,
                    'label' => "Nom",
                    'attr' => [
                        'autocomplete' => 'nom',
                        'class' => 'form-control',
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Mettez un nom',
                        ]),
                    ],
                    ])
                    ->add('addresse_rue', TextType::class, [
                        // instead of being set onto the object directly,
                        // this is read and encoded in the controller
                        'required' => true,
                        'label' => "Rue",
                        'attr' => [
                            'autocomplete' => 'rue',
                            'class' => 'form-control',
                        ],
                        'constraints' => [
                            new NotBlank([
                                'message' => 'Mettez une rue',
                            ]),
                        ],
                        ])

                        ->add('addresse_ville', TextType::class, [
                            // instead of being set onto the object directly,
                            // this is read and encoded in the controller
                            'required' => true,
                            'label' => "Ville",
                            'attr' => [
                                'autocomplete' => 'ville',
                                'class' => 'form-control',
                            ],
                            'constraints' => [
                                new NotBlank([
                                    'message' => 'Mettez une ville',
                                ]),
                            ],
                            ])

                            ->add('addresse_codepostal', TextType::class, [
                                // instead of being set onto the object directly,
                                // this is read and encoded in the controller
                                'required' => true,
                                'label' => "Code Postal",
                                'attr' => [
                                    'autocomplete' => 'code_postal',
                                    'class' => 'form-control',
                                ],
                                'constraints' => [
                                    new NotBlank([
                                        'message' => 'Mettez un code postal',
                                    ]),
                                ],
                                ])

                                

                                    
                
                ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => "Accepter les termes et conditions",
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les deux mots de passe doivent être les mêmes.',
                'mapped' => false,
                'required' => true,
                'first_options' => [
                    'label' => "Mot de passe",
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'form-control'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Entrer un mot de passe valide',
                        ]),
                        new Length([
                            'min' => 4,
                            'minMessage' => 'Votre mot de passe doit au moins contenir {{ limit }} caractères.',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                ],
                'second_options' => [
                    'label' => "Répétez le mot de passe",
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'form-control'
                    ],
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
