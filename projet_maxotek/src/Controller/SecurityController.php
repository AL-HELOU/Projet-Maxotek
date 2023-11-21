<?php

namespace App\Controller;

use App\Entity\Administrateur;
use App\Entity\User;
use App\Form\AdminPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    /**
     * this controller allow us to login
     *
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    
   /* #[Route('/connexion', name: 'security.login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $lastUsername = $authenticationUtils->getLastUsername();
        $error = $authenticationUtils->getLastAuthenticationError();


        return $this->render('pages/security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }


    /**
     * this controller allow us to logout
     *
     * @return void
     */
   /* #[Route('/deconnexion', 'security.logout')]
    public function logout()
    {
        // Nothing to do here
    }



    /**
     * this controller allow us to register
     *
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
  /*  #[Route('/inscription', 'security.registration', methods:['GET', 'POST'])]
    public function registration(Request $request, EntityManagerInterface $manager) : Response
    {
        $administrateur = new administrateur();
        $administrateur->setRoles(['ROLE_USER']);
        $form = $this->createForm(RegistrationType::class , $administrateur);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $administrateur = $form->getData();

            $this->addFlash(
                'Succes',
                'Votre compte a bien été créé'
            );

            $manager->persist($administrateur);
            $manager->flush();

            return $this->redirectToRoute('security.login');
        }

        return $this->render('pages/security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }


        /**
         * This function allow us to modify the user password
         *
         * @param administrateur $administrateur
         * @param Request $request
         * @param UserPasswordHasherInterface $hasher
         * @param EntityManagerInterface $manager
         * @return Response
         */
        /*#[Security("is_granted('ROLE_USER') and user === administrateur || is_granted('ROLE_ADMIN')")]/*/
        #[Route('/administrateur/edition-mot-de-passe/{id}', 'edit.password', methods:['GET', 'POST'])]
        public function editPassword(
            Administrateur $administrateur,
            Request $request,
            UserPasswordHasherInterface $hasher,
            EntityManagerInterface $manager
        ) : Response
            {
                /*if(!$this->getUser()) {
                    return $this->redirectToRoute('security.login');
                }

                if($this->getUser() !== $administrateur && !$this->isGranted('ROLE_ADMIN')){
                    return $this->redirectToRoute('app_home');
                }
*/
                $form = $this->createForm(AdminPasswordType::class);

                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                
                        $administrateur->setPassword($hasher->hashPassword(
                            $administrateur,
                            $form->getData()['newPassword']
                        ));

                        $this->addFlash(
                            'Succes',
                            'Le mot de passe a été modifié avec succes.'
                        );

                        $manager->persist($administrateur);
                        $manager->flush();

                        return $this->redirectToRoute('administrateur.edit', ['id' => $administrateur->getId()]);
                    
                    }
                

                return $this->render('pages/security/admin_edit_password.html.twig', [
                    'form' => $form->createView(),
                    'id' => $administrateur->getId()
                ]);
            }


        #[Route('/administrateur/edition-utilisateur-mot-de-passe/{id}', 'edituser.password', methods:['GET', 'POST'])]
        public function edituserPassword(
            User $user,
            Request $request,
            UserPasswordHasherInterface $hasher,
            EntityManagerInterface $manager
        ) : Response
            {
                /*if(!$this->getUser()) {
                    return $this->redirectToRoute('security.login');
                }

                if($this->getUser() !== $administrateur && !$this->isGranted('ROLE_ADMIN')){
                    return $this->redirectToRoute('app_home');
                }
*/
                $form = $this->createForm(AdminPasswordType::class);

                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                
                        $user->setPassword($hasher->hashPassword(
                            $user,
                            $form->getData()['newPassword']
                        ));

                        $this->addFlash(
                            'Succes',
                            'Le mot de passe a été modifié avec succes.'
                        );

                        $manager->persist($user);
                        $manager->flush();

                        return $this->redirectToRoute('user.edit', ['id' => $user->getId()]);
                    
                    }
                

                return $this->render('pages/security/admin_edituser_password.html.twig', [
                    'form' => $form->createView(),
                    'id' => $user->getId()
                ]);
            }

}
