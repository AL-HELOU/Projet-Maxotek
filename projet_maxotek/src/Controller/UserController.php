<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\User;
use App\Form\UserEditType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



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
        UserPasswordHasherInterface $hasher,
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

            $user->setPassword($hasher->hashPassword(
                $user,
                $form->getData()['password']
            ));

            $usertel = $data["user_tel"];
            $user->setUserTel($usertel);

            $usersexe = $data["user_sexe"];
            $user->setUserSexe($usersexe);

            $usertype = $data["user_type"];
            $user->setUserType($usertype);

            $user->setUserAdresse($adresse);

            $userpays = $data["user_pays"];
            $user->setUserPays($userpays);

            $usercommerc = $data["user_commerc"];
            $user->setUserCommerc($usercommerc);

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


    #[Route('/user/edition/{id}', 'user.edit', methods:['GET', 'POST'])]
    public function edit(
        User $user,
        Adresse $adresse,
        Request $request,
        EntityManagerInterface $manager
    ) : Response
    { 

        $adresse = $user->getUserAdresse();
        $form = $this->createForm(UserEditType::class, [
            "user_nom" => $user->getUserNom(),
            "user_prenom" => $user->getUserPrenom(),
            "email" => $user->getEmail(),
            "user_tel" => $user->getUserTel(),
            "user_adress" => $adresse->getAdresse(),
            "user_adresseville" => $adresse->getAdresseVille(),
            "user_adressecp" => $adresse->getAdresseCp(),
            "user_sexe" => $user->getUserSexe(),
            "user_type" => $user->getUserType(),
            "user_pays" => $user->getUserPays(),
            "user_commerc" => $user->getUserCommerc()
        ]);
 
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
 
            $data = $form->getData();

            $adress = $data["user_adress"];
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
            if ($user->getEmail() != $useremail = $data["email"]){
                $user->setEmail($useremail);
            }

            $usertel = $data["user_tel"];
            $user->setUserTel($usertel);

            $usersexe = $data["user_sexe"];
            $user->setUserSexe($usersexe);

            $usertype = $data["user_type"];
            $user->setUserType($usertype);

            $user->setUserAdresse($adresse);

            $userpays = $data["user_pays"];
            $user->setUserPays($userpays);

            $usercommerc = $data["user_commerc"];
            $user->setUserCommerc($usercommerc);

            $manager->persist($adresse);
            
            $manager->persist($user);
            $manager->flush();
 
            $this->addFlash(
                'Succes',
                "Les informations ont été modifiées avec succes."
            );
 
            return $this->redirectToRoute('user.edit', ['id' => $user->getId()]);
        }
 
        return $this->render('pages/user/edit.html.twig', [
            'form' => $form->createView(),
            'userid' => $user->getId(),
        ]);
    }



    #[Route('/user/suppression/{id}', 'user.delete', methods: ['GET'])]
    public function delete(
        EntityManagerInterface $manager,
        User $user
    ) : Response 
        {

            $manager->remove($user);
            $manager->flush();

            $this->addFlash(
                'Succes',
                'L\'utilisateur a été supprimé avec succes'
            );

            return $this->redirectToRoute('user');
        }
}
