<?php

namespace App\Controller;

use App\Entity\Bottles;
use App\Entity\Cellars;
use App\Form\AddBottleType;
use App\Repository\GrapesRepository;
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

      // Calcul note moyenne de chaque cave
      $ratings = $cellar->getRatings();
      $averageRating = 0;
      $totalRatings = count($ratings);

      if($totalRatings > 0) {
          $totalScore = array_reduce($ratings->toArray(), fn($sum, $rating) => $sum + $rating->getNotation(), 0);
          $averageRating = $totalScore / $totalRatings;

          // Si entier on affiche sans virgule sinon 1 chiffre après virgule
          $averageRating = ($averageRating == floor($averageRating)) ? (int) $averageRating : round($averageRating, 1); 
      }

        return $this->render('user/userCave.html.twig', [
            'cellar' => $cellar,
            'bottles' => $cellar ? $cellar->getBottles() : [],
            'averageRating' => $averageRating,
        ]);
    }

    // TEMPLATE D'AJOUT DE BOUTEILLE 
    
    #[IsGranted('ROLE_USER')]
    #[Route('/addBottle', name: 'app_addBottle')]
    public function addNewBottle(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser(); // On récupère les infos du user

        $cellar = $entityManager->getRepository(Cellars::class)->findOneBy(['user' => $user]); // On récupère la cave liée à l'utilisateur

        // Si aucune cave n'est liée à l'utilisateur on va en créer une
        if(!$cellar) {
            $cellar = new Cellars();
            $cellar->setUser($user);
            $entityManager->persist($cellar);
            $entityManager->flush();
        }

        $bottle = new Bottles(); // On fait une nouvelle bouteille

        // Gestion du form ensuite
        $addBottleForm = $this->createForm(AddBottleType::class, $bottle);
        $addBottleForm->handleRequest($request);

        if ($addBottleForm->isSubmitted() && $addBottleForm->isValid()) {

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
}
