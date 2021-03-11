<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Location;
use App\Entity\Outing;
use App\Entity\State;
use App\Repository\CampusRepository;
use App\Repository\LocationRepository;
use App\Repository\StateRepository;
use PhpParser\Node\Expr\BinaryOp\LogicalXor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OutingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('duration')
            ->add('registration_deadline')
            ->add('number_of_registration_max')
            ->add('outing_info')
            ->add('state', EntityType::class, [
                'class' => State::class,
                'query_builder' => function (StateRepository $stateRepository){
                    return $stateRepository->createQueryBuilder('sr');
                },
                'choice_label' => 'name'
            ])
            #->add('Users')
            #->add('State')
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'query_builder' => function (LocationRepository $locationRepository){
                    return $locationRepository->createQueryBuilder('sr');
                },
                'choice_label' => 'name'
            ])
            ->add('campus', EntityType::class, [
                'class' => Campus::class,
                'query_builder' => function (CampusRepository $campusRepository){
                    return $campusRepository->createQueryBuilder('cr');
                },
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Outing::class,
        ]);
    }


}
