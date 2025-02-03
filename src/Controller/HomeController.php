<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController{

    // Partie pour le main du site
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


// Partie pour la page bouteille unité qui présente le détail de chaque bouteille 
    #[Route('/unit/bottle', name: 'app_unit_bottle')]
    public function unitBottle(): Response
    {
        return $this->render('home/unitBottle.html.twig', [
            'controller_name' => 'UnitBottleController',
        ]);
    }

    // Partie cave de chaque utilisateurs. Définir le format d'affichage
    #[Route('/cave', name: 'app_cave')]
    public function caves(): Response
    {
        return $this->render('home/caves.html.twig', [
            'controller_name' => 'CaveController',
        ]);
    }

    // Partie toutes les bouteilles présentes sur le site. Avec filtres cépages / région / pays / année 
    // Par défaut -> Filtre A/Z
    #[Route('/bottle', name: 'app_bottle')]
    public function AllBottles(): Response
    {
        return $this->render('home/bottle.html.twig', [
            'controller_name' => 'BottleController',
        ]);
    }
}
