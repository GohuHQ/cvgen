<?php

namespace AppBundle\Form;

use AppBundle\Entity\Person;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use AppBundle\Form\ImageType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('image', ImageType::class)
            ->add('birthdate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'input' => 'datetime'
            ])
            ->add('aboutme', TextareaType::class)
            ->add('phonenumber', TextType::class, ['required' => false])
            ->add('email', EmailType::class, ['required' => false])
            ->add('facebook', UrlType::class, ['required' => false])
            ->add('twitter', UrlType::class, ['required' => false])
            ->add('skype', TextType::class, ['required' => false])
            ->add('linkedin', UrlType::class, ['required' => false])
            ->add('github', UrlType::class, ['required' => false])
            ->add('youtube', UrlType::class, ['required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person::class
        ]);
    }
}