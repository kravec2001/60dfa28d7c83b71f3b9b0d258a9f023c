<?php


namespace App\Form;

use App\Entity\PsbProfiles;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddProfileForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var EntityManager $em */
        $em = $options['em'];

        $builder
            ->add('profile', TextType::class, [
                    'required' => false,
                    'label' => 'Введите название профиля',
                    'attr' => array('autocomplete' => 'off'),
                ]
            )
            ->add('save', SubmitType::class, array(
                    'label' => 'Сохранить',
                    'attr' => array('class' => 'btn btn-first')
                )
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PsbProfiles::class,
        ]);
        $resolver->setRequired('em');
    }
}