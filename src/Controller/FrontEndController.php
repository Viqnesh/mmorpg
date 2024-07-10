<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Personnage;
use App\Entity\Inventory;
use App\Entity\Equipement;
use App\Entity\Ability;

use App\Form\PositionType;

class FrontEndController extends AbstractController
{
    /**
     * @Route("/", name="app_map")
     */
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        if (!$this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        $character = $entityManager->getRepository(Personnage::class)->findOneBy([ 'player' => $this->getUser() ]);
        $form = $this->createForm(PositionType::class, $character);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


        }
        return $this->render('player/map.html.twig', ['stats' => $character , 'form' => $form->createView()]);
    }
    /**
     * @Route("/play", name="app_play")
     */
    public function playGame(Request $request,EntityManagerInterface $entityManager): Response
    {
        if (!$this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        $character = $entityManager->getRepository(Personnage::class)->findOneBy([ 'player' => $this->getUser() ]);

        return $this->render('player/play.html.twig', ['stats' => $character ]);
    }
    /**
     * @Route("/inventory", name="app_inventory")
     */
    public function showInventory(EntityManagerInterface $entityManager): Response
    {
        if (!$this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        $inventory = $entityManager->getRepository(Inventory::class)->findOneBy([ 'id_character' => $this->getUser() ]);
        $equipement = $entityManager->getRepository(Equipement::class)->findOneBy([ 'id_character' => $this->getUser() ]);
        $character = $entityManager->getRepository(Personnage::class)->findOneBy([ 'player' => $this->getUser() ]);
        return $this->render('player/inventory.html.twig', ['stats' => $character , 'inventory' => $inventory , 'equipement' => $equipement] );
    }
    /**
     * @Route("/abilities", name="app_abilities")
     */
    public function showAbilities(EntityManagerInterface $entityManager): Response
    {
        if (!$this->getUser()) {
            throw $this->createAccessDeniedException();
        }
        $armesSpec = $entityManager->getRepository(Ability::class)->findBy([ 'id_character' => $this->getUser() , 'coupSpeciale' => NULL ] , ['ArmeSpeciale' => 'ASC']);
        $spells = $entityManager->getRepository(Ability::class)->findBy([ 'id_character' => $this->getUser() , 'ArmeSpeciale' => NULL] , ['coupSpeciale' => 'ASC']);
        $character = $entityManager->getRepository(Personnage::class)->findOneBy([ 'player' => $this->getUser() ]);

        return $this->render('player/abilities.html.twig', ['stats' => $character , 'armes' => $armesSpec , 'spells' => $spells]);
    }
}
