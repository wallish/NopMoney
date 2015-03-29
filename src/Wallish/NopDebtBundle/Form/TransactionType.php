<?php

namespace Wallish\NopDebtBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TransactionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('description')
            ->add('amount')
            ->add('activate')
            //->add('hash')
            ->add('type', 'entity', array('class' => 'WallishNopDebtBundle:Type', 'property' => 'description'))
            //->add('account', 'entity', array('class' => 'WallishNopDebtBundle:Account', 'property' => 'hash'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wallish\NopDebtBundle\Entity\Transaction'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wallish_nopdebtbundle_transaction';
    }
}
