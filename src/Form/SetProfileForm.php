<?php


namespace App\Form;

use App\Entity\PsbProfiles;
use App\Entity\PsbUser;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SetProfileForm extends AbstractType
{
    const NAME = 'user_profile';
    public function getBlockPrefix()
    {
        return self::NAME;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var EntityManager $em */
        $em = $options['em'];
        $data = $options['data'] ?? [];

        $userId = $em->getRepository(PsbUser::class)->findAll();

        $builder
            ->add('fio', ChoiceType::class, [
                'label' => 'Сотрудники',
                'choices' => $userId,
                'choice_value' => 'id',
                'choice_label' => 'fio',
                'multiple' => false,
                'placeholder' => 'Выберите отрудника',
                'label_attr' => [
                    'autocomplete' => 'off',
                ],
                'attr' => [
                    'data-width' => "100%",
                    'class' => 'selectpicker',
                    'data-live-search' => true,
                    'autocomplete' => 'off',

                ],
            ]);

        $profileId = $em->getRepository(PsbProfiles::class)->findAll();

        $builder
            ->add('profileId', ChoiceType::class, [
                'label' => 'Профили',
                'choices' => $profileId,
                'choice_value' => 'id',
                'choice_label' => 'profile',
                'multiple' => false,
                'placeholder' => 'Выберите профиль',
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

        if (isset($data['profileId']) && !empty($data['profileId'])) {
            $builder->add('usl', CollectionType::class, [
                'entry_type' => ProfileEnvType::class,
                'allow_add' => !$options['lock'],
                'entry_options' => ['em' => $em,
                    'usl' => $data['profileId'],
                    'lock' => $options['lock']],
                'prototype' => true,
                'label' => false,
            ]);
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
