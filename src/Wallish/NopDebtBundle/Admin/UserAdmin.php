<?php
namespace Wallish\NopDebtBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username', 'text', array('label' => 'User'))
            ->add('email')
            ->add('enabled', null, array('required' => false))
            ->add('locked', null, array('required' => false))
            ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    //'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Password Confirmation'),
                    'invalid_message' => 'fos_user.password.mismatch',
            ))
        ;
    }
    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('locked')
        ;
    }
    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('enabled')
            ->add('locked')
        ;
    }
}