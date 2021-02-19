<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MammalController extends AbstractController
{
    /**
     * @Route("/", name="app_home_page")
     */

    public function homepage()
    {
        $animalsList = [
            'Cachorro',
            'Veado',
            'Urso'
        ];

        return $this->render('mammal/homepage.html.twig', ['animais' => $animalsList]);
    }

    /**
     * @Route("/mammal/{slug}", name="app_mammal_details")
     */
    
    public function details($slug)
    {
        $animal = $slug;

        return $this->render('mammal/details.html.twig', ['animal' => $animal ]);
      
    }

}