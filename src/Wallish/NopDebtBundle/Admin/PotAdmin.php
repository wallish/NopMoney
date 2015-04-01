<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Wallish\NopDebtBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PotAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id', 'text',  array('label' => 'id'))
            ->add('name', 'text',  array('label' => 'name'))
            ->add('description', 'text',  array('label' => 'Description'))
            ->add('amount', 'text',  array('label' => 'Montant'))
            ->add('who', 'text',  array('label' => 'Pour qui ?'))
            ->add('user', 'entity', array('class' => 'WallishUserBundle:User', 'property' => 'username'))
            ->add('event', 'entity', array('class' => 'WallishNopDebtBundle:Event', 'property' => 'name'))
            
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('description')
            ->add('amount')
            ->add('who')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('name')
            ->add('description')
            ->add('amount')
            ->add('who')
        ;
    }
}