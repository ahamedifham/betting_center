<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends Controller
{
    protected function getRepository($class)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:'.$class);
        return $repo;
    }

    protected function getEntityManager()
    {
        $em = $this->getDoctrine()->getManager();
        return $em;
    }
}
