<?php


namespace App\Form;


use App\Entity\PsbTests;
use App\Entity\PsbTasks;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestingForm extends AbstractType
{
    const NAME = 'testing';

    public function getBlockPrefix()
    {
        return self::NAME; // TODO: Change the autogenerated stub
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var EntityManager $em */
        $em = $options['em'];
        $data = $options['data'] ?? [];

        if (isset($data['testId'])) {
            $id = $data['testId'];
        }

        if (isset($id)) {
            $tests = $em->getRepository(PsbTests::class)->findBy(['id' => $id]);
        } else {
            $tests = $em->getRepository(PsbTests::class)->findAll();
        }

        $builder
            ->add('testId', ChoiceType::class, [
                'label' => 'Доступные тесты',
                'choices' => $tests,
                'choice_value' => 'id',
                'choice_label' => 'nameTest',
                'multiple' => false,
                'placeholder' => 'Выберите тест',
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

        if (isset($data['testId'])) {

            $query = $em->createQuery(
                'SELECT t.id, t.task, t.imgTask, t.bonus, 
                            t.answer1, t.answer2, t.answer3, t.answer4
                       FROM App\Entity\PsbTasks t               
                       WHERE t.idTest = '.$data['testId'].'
                       ORDER BY t.id');
            $tasks = $query->getResult();
            $i = 1;
            foreach($tasks as $row) {

                $builder->add(
                    'task'.$row['id'],
                    ChoiceType::class,
                    [
                        'label' => $i.'. '.$row['task'],
                        'choices' => [
                            'Выберите вариант' => 0,
                            $row['answer1'] => 1,
                            $row['answer2'] => 2,
                            $row['answer3'] => 3,
                            $row['answer4'] => 4,
                        ],
                        'expanded' => false,
                        'required' => true,
                        'constraints' => [new Choice(['min' => 1])],
                    ]
                );
                $i +=1;
            }

        $builder->add('save', SubmitType::class, [
                'label' => 'Отправить',
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