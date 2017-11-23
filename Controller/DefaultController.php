<?php

namespace Ramasy\PsrizeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RamasyPsrizeBundle:Default:index.html.twig');
    }
}
