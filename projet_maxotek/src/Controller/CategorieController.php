<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'categorie', methods: ['GET'])]
    public function index(
        CategorieRepository $repository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {

        $categories = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('pages/categorie/index.html.twig', [
            'Categories' => $categories
        ]);
    }


    #[Route('/categorie/nouveau', 'categorie.new', methods:['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $manager
    ) : Response
    {
        $categorie = new Categorie();
 
        $form = $this->createForm(CategorieType::class, $categorie);
 
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
 
            $categorie = $form->getData();
 
            $manager->persist($categorie);
            $manager->flush();
 
            $this->addFlash(
                'Succes',
                "La categorie' a été ajouté avec succes"
            );
 
            return $this->redirectToRoute('categorie');
        }
 
        return $this->render('pages/categorie/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
