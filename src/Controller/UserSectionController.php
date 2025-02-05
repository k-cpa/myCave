<?php

namespace App\Controller;

use App\Entity\Bottles;
use App\Form\AddBottleType;
use App\Repository\GrapesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class UserSectionController extends AbstractController{

    // TEMPLATE CAVE PERSONNELLE DE L'UTILISATEUR 

    #[IsGranted('ROLE_USER')]
    #[Route('/yourCave', name: 'app_userCave')]
    public function userCave(): Response
    {
        return $this->render('user/userCave.html.twig', [
            'controller_name' => 'UserCaveController',
        ]);
    }

    // TEMPLATE D'AJOUT DE BOUTEILLE 
    
    #[IsGranted('ROLE_USER')]
    #[Route('/addBottle', name: 'app_addBottle')]
    public function addNewBottle(Request $request, EntityManagerInterface $entityManager): Response
    {

        $bottle = new Bottles();

        $addBottleForm = $this->createForm(AddBottleType::class, $bottle);
        $addBottleForm->handleRequest($request);

        if ($addBottleForm->isSubmitted() && $addBottleForm->isValid()) {

            $entityManager->persist($bottle);

            $entityManager->flush();

            $this->addFlash('success', 'Votre bouteille a été ajoutée avec succès !');

            return $this->redirectToRoute('app_addBottle');
        }

        return $this->render('user/addBottle.html.twig', [
            'addBottleForm' => $addBottleForm->createView(),
        ]);
    }
}
