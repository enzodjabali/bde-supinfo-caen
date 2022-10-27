<?php

namespace App\Form;

use App\Entity\Article;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'maxlength' => 22
                ]
            ])
            ->add('shortdescription', TextType::class, [
                'label' => 'Short description',
                'attr' => [
                    'maxlength' => 120
                ]
            ])
            ->add('description', CKEditorType::class, [
                'attr' => [
                    'style' => 'height: 200px'
                ]
            ])
            ->add('imagePublicPath', TextType::class, [
                'label' => 'Thumbnail image link',
                'required'   => false,
                'attr' => [
                    'maxlength' => 500
                ]
            ])
            ->add('category', ChoiceType::class, [
                'choices'  => array_combine(Article::CATEGORIES, Article::CATEGORIES)
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
