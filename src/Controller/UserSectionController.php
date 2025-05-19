<?php

namespace App\Controller;

use App\Entity\Bottles;
use App\Entity\Cellars;
use App\Form\AddBottleType;
use App\Form\DescriptionCellarType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class UserSectionController extends AbstractController{

    // TEMPLATE CAVE PERSONNELLE DE L'UTILISATEUR 

    #[IsGranted('ROLE_USER')]
    #[Route('/yourCave', name: 'app_userCave')]
    public function userCave(EntityManagerInterface $entityManager, Security $security): Response
    {
        $user = $security->getUser();
        $cellar = $entityManager->getRepository(Cellars::class)->findOneBy(['user' => $user]);
        $averageRating = null; // Pour afficher la page lorsque le user n'a pas encore de cave
                
        // Calcul note moyenne de chaque cave
        if($cellar !== null) {
            $ratings = $cellar->getRatings();
            $averageRating = 0;
            $totalRatings = count($ratings);
    
            if($totalRatings > 0) {
                $totalScore = array_reduce($ratings->toArray(), fn($sum, $rating) => $sum + $rating->getNotation(), 0);
                $averageRating = $totalScore / $totalRatings;
    
                // Si entier on affiche sans virgule sinon 1 chiffre après virgule
                $averageRating = ($averageRating == floor($averageRating)) ? (int) $averageRating : round($averageRating, 1); 
            }
        }

        return $this->render('user/userCave.html.twig', [
            'cellar' => $cellar,
            'bottles' => $cellar ? $cellar->getBottles() : [],
            'averageRating' => $averageRating,
        ]);
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/addMessage', name: 'app_addMessage')]
    public function addNewMessage(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser(); //info User

        $cellar = $entityManager->getRepository(Cellars::class)->findOneBy(['user' => $user]); // La cave de l'utilisateur

        $descriptionCellarForm = $this->createForm(DescriptionCellarType::class);
        $descriptionCellarForm->handleRequest($request);

        if($descriptionCellarForm->isSubmitted() && $descriptionCellarForm->isValid()) {
            $cellar->setDescription($descriptionCellarForm->get('description')->getData());
            $entityManager->persist($cellar);
            $entityManager->flush();

            $this->addFlash('success', 'Description mise à jour avec succès');
            return $this->redirectToRoute('app_userCave');
        }

        return $this->render('user/addDescription.html.twig', [
            'descriptionCellarForm' => $descriptionCellarForm->createView(),
        ]);
    }

    // TEMPLATE D'AJOUT DE BOUTEILLE 
    
    #[IsGranted('ROLE_USER')]
    #[Route('/addBottle', name: 'app_addBottle')]
    public function addNewBottle(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser(); // On récupère les infos du user

        $cellar = $entityManager->getRepository(Cellars::class)->findOneBy(['user' => $user]); // On récupère la cave liée à l'utilisateur


        $bottle = new Bottles(); // On fait une nouvelle bouteille

        // Gestion du form ensuite
        $addBottleForm = $this->createForm(AddBottleType::class, $bottle);
        $addBottleForm->handleRequest($request);

        if ($addBottleForm->isSubmitted() && $addBottleForm->isValid()) {

            // Si aucune cave n'est liée à l'utilisateur on va en créer une
            if(!$cellar) {
                $cellar = new Cellars();
                $cellar->setUser($user);
                $entityManager->persist($cellar);
                $entityManager->flush();
            }
            $bottle->setCellar($cellar);

            $entityManager->persist($bottle);

            $entityManager->flush();

            $this->addFlash('success', 'Votre bouteille a été ajoutée avec succès !');

            return $this->redirectToRoute('app_userCave');
        }

        return $this->render('user/addBottle.html.twig', [
            'addBottleForm' => $addBottleForm->createView(),
        ]);
    }

    // Modification d'une bouteille
    #[Route('/{id}/update', name: 'app_update')]
    public function modify(Bottles $bottle, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser(); // On récupère les infos du user

        // Gestion du form ensuite
        $addBottleForm = $this->createForm(AddBottleType::class, $bottle);

        $addBottleForm->handleRequest($request);

        if ($addBottleForm->isSubmitted() && $addBottleForm->isValid()) {

            $entityManager->persist($bottle);

            $entityManager->flush();

            $this->addFlash('success', 'Votre bouteille a été modifiée avec succès !');

            return $this->redirectToRoute('app_userCave');
        }

        return $this->render('user/modifyBottle.html.twig', [
            'addBottleForm' => $addBottleForm->createView(),
            'bottle' => $bottle,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_delete')]
    public function delete(Bottles $bottle, Request $request, EntityManagerInterface $entityManager): Response
    {

        // On verifie si le token csrf provient bien du formulaire de suppression correspondant a l'ID
        if ($this->isCsrfTokenValid('SUP'. $bottle->getId(), $request->get('_token'))) {
            $entityManager->remove($bottle); // On marque l'article pour la suppression
            $entityManager->flush(); // On effectue la requête en database
            $this->addFlash('succes', 'La bouteille est bien supprimée');
            return $this->redirectToRoute('app_userCave');
        }
        $this->addFlash('error', 'Token invalide');
        return $this->redirectToRoute('app_userCave');
    }
}
