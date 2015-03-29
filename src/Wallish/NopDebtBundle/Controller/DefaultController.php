<?php

namespace Wallish\NopDebtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WallishNopDebtBundle:Default:index.html.twig');
    }
}
