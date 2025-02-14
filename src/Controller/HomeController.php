<?php

namespace App\Controller;

use App\Entity\Cellars;
use App\Entity\Ratings;
use App\Form\ContactType;
use App\Repository\BottlesRepository;
use App\Repository\CellarsRepository;
use App\Repository\RatingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController{

    // Partie pour le main du site
    #[Route('/', name: 'app_home')]
    public function contactForm(Request $request, MailerInterface $mailer): Response
    {

        $contactForm = $this->createForm(ContactType::class);
        $contactForm->handleRequest($request);

        if($contactForm->isSubmitted() && $contactForm->isValid()) {
            $data = $contactForm->getData(); // Récupération des champs du formulaire

            $email = (new Email())
                ->from('07148281344577@mailtrap.io')
                ->to('kevcampana@gmail.com')
                ->subject('Nouveau message de contact')
                ->text(
                    "Nom: {$data['name']}\n".
                    "Email: {$data['email']}\n\n".
                    "Message:\n{$data['message']}"
                );
                $mailer->send($email);
        }
        return $this->render('home/index.html.twig', [
            'contactForm' => $contactForm->createView(),
        ]);
    }

    // TEMPLATE cave de chaque utilisateurs. Définir le format d'affichage
    #[Route('/all/caves', name: 'app_allCaves')]
    public function caves(CellarsRepository $cellarsRepository, BottlesRepository $bottleRepository): Response
    {

        $cellars = $cellarsRepository->findAll();
        $cellarsWithBottles = [];

        foreach($cellars as $cellar) {
            $bottles = $bottleRepository->findBy(
                ['cellar' => $cellar], // Bouteille associée à cave
                null, // Pas de tri
                3, // limiter à 3 bouteilles
            );

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

            $cellarsWithBottles[] = [
                'cellar' => $cellar,
                'bottles' => $bottles,
                'averageRating' => $averageRating,
                'totalRatings' => $totalRatings,
            ];
        }

        return $this->render('home/allCaves.html.twig', [
            'cellarsWithBottles' => $cellarsWithBottles,
            'averageRating' => $averageRating,
        ]);
    }


    // TEMPLATE cave sélectionnée par l'utilisateur dans allCaves
    #[Route('/cave/{id}', name: 'app_unit_cave')]
    public function viewCellar(int $id, EntityManagerInterface $entityManager, RatingsRepository $ratingRepository): Response
    {
        $cellar = $entityManager->getRepository(Cellars::class)->find($id);
        $user = $this->getUser();

        $hasVoted = $ratingRepository->findOneBy([
            'cellar' => $cellar,
            'user' => $user,
        ]) !== null;

        return $this->render('home/unitCave.html.twig', [
            'cellar' => $cellar,
            'bottles' => $cellar->getBottles(),
            'hasVoted' => $hasVoted,
        ]);
    }

    #[Route('/submit-rating/{id}', name: 'submit_rating', methods: ['POST'])]
    public function submitRating(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $ratingValue = (int) $request->get('rating');
        
        if ($ratingValue < 1 || $ratingValue > 5) {
            throw $this->createNotFoundException("Valeur de notation invalide !");
        }

        // Récupérer la cave à partir de l'ID
        $cellar = $entityManager->getRepository(Cellars::class)->find($id);
        if (!$cellar) {
            throw $this->createNotFoundException("Cave introuvable !");
        }

        // Créer une nouvelle note
        $rating = new Ratings();
        $rating->setNotation($ratingValue);
        $rating->setCellar($cellar);
        $rating->setUser($this->getUser());  // Récupérer l'utilisateur connecté

        // Enregistrer la note dans la base de données
        $entityManager->persist($rating);
        $entityManager->flush();

        // Rediriger l'utilisateur vers la page de la cave, avec un message de confirmation
        return $this->redirectToRoute('app_unit_cave', ['id' => $id]);
    }


    // TEMPLATE pour la page bouteille unité qui présente le détail de chaque bouteille 
    #[Route('/unit/bottle', name: 'app_unit_bottle')]
    public function unitBottle(): Response
    {
        return $this->render('home/unitBottle.html.twig', [
            'controller_name' => 'UnitBottleController',
        ]);
    }
}
