<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BackBundle\Form\SoundtracksType;

class MovieType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('frTitle', TextType::class)
                ->add('enTitle', TextType::class)
                ->add('style', TextType::class)
                ->add('screenplay', TextType::class)
                ->add('plot', TextareaType::class)
                ->add('releaseDate', DateType::class, ['years' => range(1970, 2014), 'placeholder' => ['year' => 'Year', 'month' => 'Month', 'day' => 'Day']])
                ->add('runningTime', TimeType::class, ['placeholder' => ['hour' => 'Hour', 'minute' => 'Minute'], 'hours' => range(0, 2)])
                ->add('language', LanguageType::class)
                ->add('soundtracks', EntityType::class, array(
                    'class' => 'BackBundle:Soundtracks',
                    'choice_label' => 'label'
                ))
                ->add('companies', CollectionType::class, array(
                    'allow_add' => true,
                    'allow_delete' => true,
                    //'label_format' => 'lul',
                    'prototype' => true,
                    'entry_type' => CompagnyType::class,
                     'entry_options' => [
                        'label' => false,
                         
                    ],
                    'attr' => array(
                        'class' => 'my-selector',
                    ),
                ))
                //->add('soundtracks', SoundtracksType::class)
                //->add('companies', CollectionType::class, array('entry_type' => CompagnyType::class, 'allow_add' => true, 'allow_delete' => true))
                ->add('send', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Movie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'backbundle_movie';
        //return 'MovieType';
    }

}
