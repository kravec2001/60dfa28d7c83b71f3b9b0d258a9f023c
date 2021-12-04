<?php


namespace App\Form;


use App\Entity\PsbProjects;
use App\Entity\PsbTests;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserProjectForm extends AbstractType
{
    const NAME = 'user_project';

    public function getBlockPrefix()
    {
        return self::NAME; // TODO: Change the autogenerated stub
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var EntityManager $em */
        $em = $options['em'];
        $data = $options['data'] ?? [];

        if (isset($data['id'])) {
            $id = $data['id'];
        }

        if (isset($id)) {
            $projects = $em->getRepository(PsbProjects::class)->findBy(['id' => $id]);
        } else {
            $projects = $em->getRepository(PsbProjects::class)->findAll();
        }

        $projectId = $em->getRepository(PsbProjects::class)->findAll();

        $builder
            ->add('projectId', ChoiceType::class, [
                'label' => 'Проекты',
                'choices' => $projects,
                'choice_value' => 'id',
                'choice_label' => 'name',
                'multiple' => false,
                'placeholder' => 'Выберите проект',
                'required' => false,
                'label_attr' => [
                    'autocomplete' => 'off',
                ],
                'attr' => [
                    'data-width' => "100%",
                    'class' => 'selectpicker',
                    'data-live-search' => true,
                    'autocomplete' => 'off',
                    'onchange' => 'this.form.submit()'
                ],
            ]);

        if (isset($id)) {
            $builder->add('save', SubmitType::class, [
                    'label' => 'Выполнено',
                    'attr' => [
                        'class' => 'btn btn-success btn-lg',
                        'style' => 'display:block; margin:auto',
                    ],
                ]
            );
        }

    }


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'validation_groups' => false,
            'lock' => false,
        ]);

        $resolver->setRequired('em');
    }
}