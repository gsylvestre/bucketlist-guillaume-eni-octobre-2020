<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Idea;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;

class IdeaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['label' => 'Your idea'])
            ->add('description', null, ['label' => 'Tell us a little more'])
            ->add('author', null, ['label' => 'Who are you?'])
            ->add('category', EntityType::class, [
                //quelle Entity est utilisée pour populer le select
                'class' => Category::class,
                //quelle propriété est utilisée pour l'affichage
                'choice_label' => 'name',
                //pour personnaliser la requête à la bdd !
                //on pourrait aussi créer une méthode dans notre CategoryRepository
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
            ])
            ->add('picture', FileType::class, [
                'mapped' => false, //ce champ n'existe pas dans mon entité
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new Image([
                        'maxSize' => '7024k',
                    ])
                ],
            ])
            ->add('send', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Idea::class,
        ]);
    }
}
