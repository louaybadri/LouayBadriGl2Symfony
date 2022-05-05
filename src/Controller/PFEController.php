<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Entity\Product;
use App\Form\PfeType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/pfe')]
class PFEController extends AbstractController
{
    #[Route('/', name: 'pfe')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(PFE::class);
        $pfes = $repo->findAll();

        return $this->render('pfe/index.html.twig', [
            'pfe'=>end($pfes),'pfes'=>$pfes
        ]);
    }
    #[Route('/add', name: 'add')]
    public function add(EntityManagerInterface $manager, Request $request): Response
    {

//        $manager=$this->getDoctrine()->getManaget();
        $PFE = new PFE();
        $form = $this->createForm(PfeType::class, $PFE);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $manager->persist($PFE);
            $manager->flush();
            return $this->redirectToRoute('pfe');
//            dd($request);
        }
        return $this->render('PFE/add.html.twig', ['form' => $form->createView()]);
    }
}
