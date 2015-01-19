<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class ApiController extends Controller
{

    /**
     * @Route("/api/edition/{editionId}.{_format}",
     *     defaults = {"_format"="json"},
     *     requirements = { "_format" = "json" }
     * )
     */
    public function editionPagesAction($editionId)
    {

        $em = $this->getDoctrine()->getManager();

        //$entities = $em->getRepository('AppBundle:Page')->findAll();
        $entities = $em->getRepository('AppBundle:Page') -> findBy(array('edition' => $editionId ));

        $serializer = $this->container->get('serializer');
        $editions = $serializer->serialize($entities, 'json');
        return new Response($editions);
    }
}
