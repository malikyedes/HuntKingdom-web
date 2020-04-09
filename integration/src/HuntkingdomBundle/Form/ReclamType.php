<?php

namespace HuntkingdomBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Gregwar\CaptchaBundle\Type\CaptchaType;

class ReclamType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
                ->add('prenom')
                ->add('email' )
                ->add('tel')
                ->add('description')
                ->add('sujet', ChoiceType::class, [
                    'choices'  => [
                        'Problème d authentification' => 'Probleme d authentification',
                        'Problème d achat' => 'Probleme d achat',
                        'Problème dans un blog/article' => 'Probleme dans un blog/article',
                    ]
                ])
                ->add('screenshot', FileType::class, array('data_class' => null), array('label'=>'Upload image'))
                ->add('date' )
                ->add('captcha', CaptchaType::class, array('ignore_all_effects'=>2)
            );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HuntkingdomBundle\Entity\Reclam'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'huntkingdombundle_reclam';
    }


}
