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

    // TEMPLATE cave de chaque utilisateurs. Définir le format d'affichage
    #[Route('/all/caves', name: 'app_allCaves')]
    public function caves(): Response
    {
        return $this->render('home/caves.html.twig', [
            'controller_name' => 'CaveController',
        ]);
    }

    // TEMPLATE cave sélectionnée par l'utilisateur dans allCaves
    #[Route('/unit/cave', name: 'app_unit_cave')]
    public function index(): Response
    {
        return $this->render('unit_cave/index.html.twig', [
            'controller_name' => 'UnitCaveController',
        ]);
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
