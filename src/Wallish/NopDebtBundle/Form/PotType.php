<?php

namespace Wallish\NopDebtBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PotType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('event', 'entity', array('class' => 'WallishNopDebtBundle:Event', 'property' => 'name'))
            //->add('name')
            ->add('description')
            ->add('who')
            ->add('dateEnd')
            ->add('amount')

            //->add('hash')
            //->add('user')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wallish\NopDebtBundle\Entity\Pot'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wallish_nopdebtbundle_pot';
    }
}
