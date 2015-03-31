<?php

namespace Wallish\NopDebtBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hash')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('user')
                                    ->add('transactions', 'collection', array(
    'type'   => 'choice',
    'options'  => array(
        'choices'  => array(
            'nashville' => 'Nashville',
            'paris'     => 'Paris',
            'berlin'    => 'Berlin',
            'london'    => 'London',
        ),
    ),
));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wallish\NopDebtBundle\Entity\Account'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wallish_nopdebtbundle_account';
    }
}
