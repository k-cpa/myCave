<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez saisir votre nom d\'utilisateur'])
                ],
            ])
            ->add('email', RepeatedType::class, [
                'type' => EmailType::class,
                'invalid_message' => 'L\'adresse mail ne correspond pas',
                'options' => ['attr' => ['class' => 'email_field']],
                'required' => true,
                'first_options' => ['label' => 'Adresse mail'],
                'second_options' => ['label' => 'Confirmez l\'adresse mail'],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez saisir votre email']),
                    new Email(['message' => 'Veillez saisir un email valide']),
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
