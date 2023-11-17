<?php

namespace App\Controller;

use App\Entity\Administrateur;
use App\Form\AdministrateurType;
use App\Form\AdministrateurEditType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\AdministrateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdministrateurController extends AbstractController
{
    /**
     * Ce 'controller' affiche tous les administrateurs
     *
     * @param AdministrateurRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/administrateur', name: 'administrateur', methods: ['GET'])]
    public function index(AdministrateurRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {

        $administrateurs = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('pages/administrateur/index.html.twig', [
            'Administrateurs' => $administrateurs
        ]);
    }


    /**
     * Ce 'controller' affiche un formulaire pour ajouter un administrateur
     *
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('/administrateur/nouveau', 'administrateur.new', methods:['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $manager
    ) : Response
    {
        $administrateur = new Administrateur();
        $administrateur->setRoles(['ROLE_ADMIN']);
 
        $form = $this->createForm(AdministrateurType::class, $administrateur);
 
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
 
            $administrateur = $form->getData();
 
            $manager->persist($administrateur);
            $manager->flush();
 
            $this->addFlash(
                'Succes',
                "L'administrateur' a été ajouté avec succes"
            );
 
            return $this->redirectToRoute('administrateur');
        }
 
        return $this->render('pages/administrateur/new.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * Ce 'controller' affiche un formulaire pour modifier un administrateur
     *
     * @param administrateur $administrateur
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('/administrateur/edition/{id}', 'administrateur.edit', methods: ['GET', 'POST'])]
    public function edit(
        administrateur $administrateur,
        Request $request,
        EntityManagerInterface $manager
    ) : Response
        {
    /*      if(!$this->getUser()) {
                return $this->redirectToRoute('security.login');
            }

            if($this->getUser() !== $administrateur && !$this->isGranted('ROLE_ADMIN')){
                return $this->redirectToRoute('app_home');
            }
    */

            $form = $this->createForm(AdministrateurEditType::class, $administrateur);

            $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) {

                $administrateur = $form->getData();

                $manager->persist($administrateur);
                $manager->flush();

                $this->addFlash(
                    'Succes',
                    'Les informations ont été modifiées avec succes.'
                );

                return $this->redirectToRoute('administrateur.edit', ['id' => $administrateur->getId()]);
            }

            return $this->render('pages/administrateur/edit.html.twig', [
                'form' => $form->createView(),
                'userid' => $administrateur->getId()
            ]);
        }


    /**
     * Ce 'controller' affiche un formulaire pour supprimer un administrateur
     *
     * @param EntityManagerInterface $manager
     * @param Administrateur $administrateur
     * @return Response
     */
    #[Route('/administrateur/suppression/{id}', 'Administrateur.delete', methods: ['GET'])]
    public function delete(
        EntityManagerInterface $manager,
        Administrateur $administrateur
    ) : Response 
        {

            $manager->remove($administrateur);
            $manager->flush();

            $this->addFlash(
                'Succes',
                'L\'administrateur a été supprimé avec succes'
            );

            return $this->redirectToRoute('administrateur');
        }
}
