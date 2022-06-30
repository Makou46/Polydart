<?php

namespace App\Form;

use Symfony\Config\FosCkEditorConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prénom',
            ]])
            ->add('nom', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'nom',
            ]])
            ->add('adresse', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'adress',
            ]])
            ->add('email', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'email',
            ]])
            ->add('ville', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ville',
            ]])
            ->add('pays', ChoiceType::class,[
                'attr' => [
                    'class' => 'form-control',],
                'choices'  => [
                    'France' => null,
                    'Belgique' => true,
                    'Autres' => false,
                ]])
            ->add('message', TextareaType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre message',
            ]])
            ->add('envoyer', SubmitType::class,[
                'attr' => [
                    'class' => ' btn-contact ',
            ]])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
