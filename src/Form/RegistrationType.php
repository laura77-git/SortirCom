<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\User;
use App\Repository\CampusRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstname')
            ->add('pseudo')
            ->add('phone')
            ->add('email')
            ->add('password', PasswordType::class) // mot de passe masqué
            ->add('campus', EntityType::class, [
                'class' => Campus::class,
                'query_builder' => function (CampusRepository $cr) {
                    return $cr->createQueryBuilder('cr');
                },
                'choice_label' => 'name'
            ])
           # ->add('outing')
            ->add('confirm_password', PasswordType::class)


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    // fonction qui permet de récupérer le nom du campus
    private function getChoices(CampusRepository $campusRepository)
    {
//        $choices =Campus::NAME;
//        $output = [];
//        foreach ($choices as $k => $v){   // $k => $v cà transforme la clé en variable
//            $output[$v] = $k;
//        }
//        return $output;
        return $campusRepository->findAll();
    }

}
