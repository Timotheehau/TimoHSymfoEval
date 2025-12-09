<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var Article $article */
        $article = $options['data'];

        // Contenu par défaut si création
        $defaultContent = "gestation: \nhumeur_max: \nhumeur_min: \nenergie: \n";

        $builder
            ->add('title', TextType::class)

            ->add('content', TextareaType::class, [
                'data' => $article && $article->getId() ? $article->getContent() : $defaultContent,
            ])

            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Image de l’article'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
