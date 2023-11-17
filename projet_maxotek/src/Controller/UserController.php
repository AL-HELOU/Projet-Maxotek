<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Commercial;
use App\Entity\Pays;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UserController extends AbstractController
{
    #[Route('/user', name: 'user', methods: ['GET'])]
    public function index(UserRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        
        $users = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            10
        );


        return $this->render('pages/user/index.html.twig', [
            'Users' => $users
        ]);
    }


    #[Route('/user/nouveau', 'user.new', methods:['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $manager
    ) : Response
    {
        $user = new User();
        $adresse = new Adresse();
        
        $user->setRoles(['ROLE_USER']);
 
        $form = $this->createForm(UserType::class);
 
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
 
            $data = $form->getData();

            $adress = $data["user_adresse"];
            $adresse->setAdresse($adress);

            $adresseville = $data["user_adresseville"];
            $adresse->setAdresseVille($adresseville);

            $adressecp = $data["user_adressecp"];
            $adresse->setAdresseCp($adressecp);

            $usernom = $data["user_nom"];
            $user->setUserNom($usernom);

            $userprenom = $data["user_prenom"];
            $user->setUserPrenom($userprenom);

            $useremail = $data["email"];
            $user->setEmail($useremail);

            $password = $data["password"];
            $user->setPassword($password);

            $usertel = $data["user_tel"];
            $user->setUserTel($usertel);

            $usersexe = $data["user_sexe"];
            $user->setUserSexe($usersexe);

            $usertype = $data["user_type"];
            $user->setUserType($usertype);

            $user->setUserAdresse($adresse);

            $pays = $manager->getRepository(Pays::class)->find(1);
            $com = $manager->getRepository(Commercial::class)->find(1);
 
            $user->setUserPays($pays);
            $user->setUserCommerc($com);

            $manager->persist($adresse);
            $manager->persist($user);
            $manager->flush();
 
            $this->addFlash(
                'Succes',
                "L'utilisateur' a été ajouté avec succes"
            );
 
            return $this->redirectToRoute('user');
        }
 
        return $this->render('pages/user/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
