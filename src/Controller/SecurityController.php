<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\SigninType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
            // POUR S'INSCRIRE
    #[Route('/signIn', name: 'app_signin')]
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHash): Response
    {

        $user = new Users();

        $formSignIn = $this->createForm(SigninType::class, $user);
        $formSignIn->handleRequest($request);

        if ($formSignIn->isSubmitted() && $formSignIn->isValid()) {

            $user->setRoles(['ROLE_USER']);
            $user->setPassword(
                $passwordHash->hashPassword($user, $formSignIn->get('password')->getData())
            );

        $entityManager->persist($user);

        $entityManager->flush();

        $this->addFlash('success', 'Votre profil est enregistré sur le site');
        return $this->redirectToRoute('app_login');

        }

        return $this->render('security/signin.html.twig', [
            'formSignIn' => $formSignIn->createView(),
        ]);
    }

    // POUR SE CONNECTER
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    // POUR SE DECONNECTER
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

}
