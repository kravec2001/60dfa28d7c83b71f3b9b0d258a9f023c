<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\PsbEvents;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileEnvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var EntityManager $em */
        $em = $options["em"];

        $list_evn = $em->getRepository(PsbEvents::class)->findAll();

        $builder->add('idEvents', ChoiceType::class, [
            'label' => ' ',
            'choices' => $list_evn,
            'choice_value' => 'id',
            'choice_label' => function (?PsbEvents $category) {
                return $category ? $category->getEvent() : '';
            },
            'multiple' => false,
            'placeholder' => 'Выберите событие',
            'label_attr' => [
                'autocomplete' => 'off',
            ],
            'attr' => [
                'data-width' => "100%",
                'class' => 'selectpicker',
                'data-live-search' => true,
                'autocomplete' => 'off',
                'disabled' => $options['lock']
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('em');
        $resolver->setRequired('usl');
        $resolver->setRequired('lock');
    }
}
