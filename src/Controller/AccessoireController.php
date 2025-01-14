<?php

namespace App\Controller;

use App\Entity\Accessoire;
use App\Form\AccessoireType;
use App\Repository\AccessoireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/accessoire')]
class AccessoireController extends AbstractController
{
    #[Route('/', name: 'accessoire_index', methods: ['GET'])]
    public function index(AccessoireRepository $accessoireRepository): Response
    {
        return $this->render('accessoire/index.html.twig', [
            'features' => $accessoireRepository->findFeatured(),
        ]);
    }

    #[Route('/new', name: 'accessoire_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $accessoire = new Accessoire();
        $form = $this->createForm(AccessoireType::class, $accessoire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($accessoire);
            $entityManager->flush();

            return $this->redirectToRoute('accessoire_index');
        }

        return $this->render('accessoire/new.html.twig', [
            'accessoire' => $accessoire,
            'form' => $form->createView(),
        ]);
    }


}