<?php

namespace AppBundle\Controller\Retailer;

use AppBundle\Entity\Retailer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    /**
     * @Route("/varejista/", name="dashboard")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        /** @var Retailer $user */
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        $quotes = $em->getRepository('AppBundle:Quote')->findBy(['retailer' => $user, 'deleted' => false], ['createdAt' => 'DESC']);
        $martinsOrders = $em->getRepository('AppBundle:MartinsOrder')->findBy(['retailer' => $user, 'deleted' => false], ['createdAt' => 'DESC']);
        $listings = $em->getRepository('AppBundle:Listing')->findBy(['retailer' => $user, 'deleted' => false], ['createdAt' => 'DESC']);
        $products = $em->getRepository('AppBundle:Product')->findBy(['retailer' => $user, 'deleted' => false], ['createdAt' => 'DESC']);
        $suppliers = $em->getRepository('AppBundle:Supplier')->findBy(['retailer' => $user, 'deleted' => false]);
        $average = $em->getRepository('AppBundle:QuoteSupplier')->getQuotesAverage($user->getId())[0];

        //quote status
        $status['0'] = "Em Andamento";
        $status['1'] = "Encerrada";

        //type of listings
        $types['0'] = 'Não Informado';
        $types['1'] = 'Comum';
        $types['2'] = 'Sazonal';
        $types['3'] = 'Semanal';

        return $this->render('Retailer/dashboard/index.html.twig', [
            'quotes' => $quotes,
            'martinsOrders' => $martinsOrders,
            'listings' => $listings,
            'products' => $products,
            'suppliers' => $suppliers,
            'average' => $average['average'],
            'status' => $status,
            'types' => $types,
            'username' => $user->getFantasyName(),
            'userIsRCA' => $user->isRCAVirtual(),
        ]);
    }

    /**
     * @Route("/varejista/termos", name="use_terms")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function termsAction(Request $request)
    {
        /** @var Retailer $user */
        $user = $this->get('security.token_storage')->getToken()->getUser();

        return $this->render('Retailer/terms.html.twig', [
            'username' => $user->getFantasyName(),
            'userIsRCA' => $user->isRCAVirtual(),
        ]);
    }
}
