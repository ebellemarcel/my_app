<?php
// src/Controller/ProprieteController.php
namespace App\Controller;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProprieteController extends AbstractController
{
    #[Route('/proprietes', name: 'property_list')]
    public function list(Request $request, ProprieteRepository $proprieteRepository): Response
    {
        $page = $request->query->getInt('page', 1);
        $proprietes = $proprieteRepository->findPaginated($page);
        
        return $this->render('propriete/list.html.twig', [
            'proprietes' => $proprietes,
        ]);
    }

    #[Route('/propriete/{id}', name: 'propriete_detail')]
    public function detail(Propriete $propriete): Response
    {
        return $this->render('propriete/detail.html.twig', [
            'propriete' => $propriete,
        ]);
    }
}