<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Continent;
use App\Entity\Famille;
use App\Repository\AnimalRepository;
use App\Repository\ContinentRepository;
use App\Repository\FamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContinentController extends AbstractController
{
    /**
     * @Route("/continents", name="continents")
     */
    public function index(ContinentRepository $repository): Response
    {
        $continents = $repository->findAll();
        return $this->render('continent/index.html.twig', [
            'continents' => $continents,
        ]);
    }

     /**
     * @Route("/continent/{id} ", name="afficher_continent")
     */
    public function afficherContinent(Continent $continent, FamilleRepository $familleRepository, AnimalRepository $animalRepository): Response
    {

        $animaux = $animalRepository->findAll();
        $familles = $familleRepository->findAll();
        return $this->render('continent/afficherContinent.html.twig', [
            'continent' => $continent,
            'familles' => $familles,
            'animaux' => $animaux
        ]);
    }
}
