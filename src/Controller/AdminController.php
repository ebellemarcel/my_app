<?php
// src/Controller/AdminController.php
namespace App\Controller;

use App\Entity\Propriete;
use App\Form\PropertyType;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'admin_dashboard')]
    public function dashboard(ProprieteRepository $proprieteRepository): Response
    {
        $stats = $proprieteRepository->getStats();
        return $this->render('admin/dashboard.html.twig', [
            'stats' => $stats,
        ]);
    }

    #[Route('/propriete/new', name: 'admin_property_new')]
    public function new(Request $request): Response
    {
        $propriete = new Propriete();
        $form = $this->createForm(PropertyType::class, $propriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($propriete);
            $entityManager->flush();

            return $this->redirectToRoute('admin_dashboard');
        }

        return $this->render('admin/property_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}