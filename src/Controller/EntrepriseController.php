<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\PFE;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/entreprise')]
class EntrepriseController extends AbstractController
{
    #[Route('/', name: 'entreprise')]
    public function index(EntityManagerInterface $manager): Response
    {
        $qb = $manager->createQuery('
        SELECT DISTINCT(E.Name) as Name,COUNT(P) as occ
        FROM App\Entity\PFE P,App\Entity\Entreprise E
        where E=P.entreprise
        group by E     
        ');
        $table = $qb->getResult();


        return $this->render('entreprise/index.html.twig', [
            'table' => $table,
        ]);
    }
    // to reset the database
//    #[Route('/reset', name: 'reset2')]
//    public function reset(ManagerRegistry $doctrine,EntityManagerInterface $manager, Request $request): Response
//    {
//        $repo = $doctrine->getRepository(Entreprise::class);
//        $pfes = $repo->findAll();
//        foreach ($pfes as $pfe )
//            $manager->remove($pfe);
//        $manager->flush();
//        return $this->redirectToRoute('entreprise');
//    }
}
