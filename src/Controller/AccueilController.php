<?php

namespace App\Controller;
use App\Entity\Livre;
use App\Entity\Auteur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(): Response
    {
        
        $livres = $this->getDoctrine()->getRepository(Livre::class)->findAll();

        if (!$livres) {
            throw $this->createNotFoundException(
                'No livres found for id '
            );
        }
       return $this->render(
            'accueil/index.html.twig',
            array('livres' => $livres)
        );

    }
        /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail($id): Response
    {
        
        $livres = $this->getDoctrine()->getRepository(Livre::class)->find($id);

        if (!$livres) {
            throw $this->createNotFoundException(
                'No livres found for id '
            );
        }
       return $this->render(
            'accueil/detail.html.twig',
            array('livre' => $livres)
        );

    }
}
