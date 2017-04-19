<?php

namespace GalleryBundle\Form;

use GalleryBundle\Entity\PictureComment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PictureCommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content',null, array('label' => 'Message'))
            ->add('picture',HiddenType::class, array("mapped" => false))
            ->add('add',SubmitType::class, array('label' => 'Add Comment'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => PictureComment::class,
        ));
    }
}