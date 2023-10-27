<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', 'home.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/home.html.twig');
    }


    /**
     * This function display the page 'Politique de confidentialité'
     *
     * @return Response
     */
    #[Route('/politiquedeconfidentialite', name: 'politiquedeconfidentialite')]
    public function politiquedeconfidentialite(): Response
    {
        return $this->render('pages/politique-mentions/poldeconfident.html.twig');
    }


    /**
     * This function display the page 'Mentions légales'
     *
     * @return Response
     */
    #[Route('/mentionslegales', name: 'mentionslegales')]
    public function mentionslegales(): Response
    {
        return $this->render('pages/politique-mentions/mentionslegales.html.twig');
    }
}

?>