<?php

namespace Wallish\Bundle\NopDebtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WallishNopDebtBundle:Default:index.html.twig', array('name' => $name));
    }
}
