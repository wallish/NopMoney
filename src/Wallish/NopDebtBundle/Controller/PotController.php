<?php

namespace Wallish\NopDebtBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Wallish\NopDebtBundle\Entity\Pot;
use Wallish\NopDebtBundle\Form\PotType;

/**
 * Pot controller.
 *
 */
class PotController extends Controller
{

    /**
     * Lists all Pot entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WallishNopDebtBundle:Pot')->findAll();

        return $this->render('WallishNopDebtBundle:Pot:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Lists user Pot entities.
     *
     */
    public function myAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WallishNopDebtBundle:Pot')->findBy(array('user' => $this->getUser()));
        //die(var_dump($entities));

        return $this->render('WallishNopDebtBundle:Pot:my.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Pot entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Pot();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pot_show', array('id' => $entity->getId())));
        }

        return $this->render('WallishNopDebtBundle:Pot:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Pot entity.
     *
     * @param Pot $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pot $entity)
    {
        $form = $this->createForm(new PotType(), $entity, array(
            'action' => $this->generateUrl('pot_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Pot entity.
     *
     */
    public function newAction()
    {
        $entity = new Pot();
        $form   = $this->createCreateForm($entity);

        return $this->render('WallishNopDebtBundle:Pot:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Pot entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WallishNopDebtBundle:Pot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WallishNopDebtBundle:Pot:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Pot entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WallishNopDebtBundle:Pot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pot entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WallishNopDebtBundle:Pot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Pot entity.
    *
    * @param Pot $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pot $entity)
    {
        $form = $this->createForm(new PotType(), $entity, array(
            'action' => $this->generateUrl('pot_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pot entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WallishNopDebtBundle:Pot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pot_edit', array('id' => $id)));
        }

        return $this->render('WallishNopDebtBundle:Pot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Pot entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WallishNopDebtBundle:Pot')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pot entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pot'));
    }

    /**
     * Creates a form to delete a Pot entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pot_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
