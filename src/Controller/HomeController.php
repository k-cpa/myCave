<?php

namespace App\Controller;

use App\Entity\Cellars;
use App\Repository\CellarsRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function caves(CellarsRepository $cellarsRepository): Response
    {

        $cellars = $cellarsRepository->findAll();

        return $this->render('home/allCaves.html.twig', [
            'cellars' => $cellars,
        ]);
    }


    // TEMPLATE cave sélectionnée par l'utilisateur dans allCaves
    #[Route('/cave/{id}', name: 'app_unit_cave')]
    public function viewCellar(int $id, EntityManagerInterface $entityManager): Response
    {
        $cellar = $entityManager->getRepository(Cellars::class)->find($id);

        return $this->render('home/unitCave.html.twig', [
            'cellar' => $cellar,
            'bottles' => $cellar->getBottles(),
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
