<?php

namespace App\Controller;

use App\Entity\Dispose;
use App\Entity\Personne;
use App\Repository\DisposeRepository;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personnes", name="personnes")
     */
    public function index(PersonneRepository $repository, DisposeRepository $disposeRepository): Response
    {
        $personnes = $repository->findAll();
        $disposes = $disposeRepository->findAll();
        return $this->render('personne/personnes.html.twig', [
            'personnes' => $personnes,
            'disposes' => $disposes
        ]);
    }

    /**
     * @Route("/personne/{id} ", name="afficher_personne")
     */
    public function afficherPersonne(Personne $personne): Response
    {
        return $this->render('personne/afficherPersonne.html.twig', [
            'personne' => $personne
        ]);
    }

    
}
