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
    #[Route('/{id<\d+>?}', name: 'pfe')]
    public function index(ManagerRegistry $doctrine,PFE $pfe=null): Response
    {
        return $this->render('pfe/index.html.twig', [
            'pfe'=>$pfe
//            'pfe'=>end($pfes),'pfes'=>$pfes
        ]);
    }
    #[Route('/add/', name: 'addPFE')]
    public function add(EntityManagerInterface $manager, Request $request): Response
    {

//        $manager=$this->getDoctrine()->getManaget();
        $PFE = new PFE();
        $form = $this->createForm(PfeType::class, $PFE);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $manager->persist($PFE);
            $manager->flush();
            return $this->redirectToRoute('pfe',['id'=>$PFE->getId()]);
//            dd($request);
        }
        return $this->render('PFE/add.html.twig', ['form' => $form->createView()]);
    }
//     to reset the database
//    #[Route('/reset', name: 'reset')]
//    public function reset(ManagerRegistry $doctrine,EntityManagerInterface $manager, Request $request): Response
//    {
//        $repo = $doctrine->getRepository(PFE::class);
//        $pfes = $repo->findAll();
//        foreach ($pfes as $pfe )
//            $manager->remove($pfe);
//        $manager->flush();
//        return $this->redirectToRoute('pfe');
//    }
}
