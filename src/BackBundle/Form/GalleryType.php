<?php

namespace BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class GalleryType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('type', ChoiceType::class, array('choices' => array(
                        'poster' => 'poster',
                        'photogram' => 'photogram',
                        'Movie Set Pictures' => 'moviesetpictures'),
                    'choices_as_values' => true, 'multiple' => false, 'expanded' => true
                ))
                ->add('movie', EntityType::class, array('class' => 'BackBundle:Movie', 'choice_label' => 'frTitle'))
                ->add('file', FileType::class)
                ->add('alt', TextType::class)
                //->add('path')
                ->add('submit', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'BackBundle\Entity\Gallery'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'backbundle_gallery';
    }

}
