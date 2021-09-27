<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Property;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;   
    }

    #[Route('/nos_proprietes', name: 'property')]
    public function index(Request $request): Response
    {

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
                $property = $this->entityManager->getRepository(Property::class)->findWithSearch($search);
        }else {
            $property = $this->entityManager->getRepository(Property::class)->findAll();
        }

        return $this->render('property/index.html.twig', [
                'property' => $property,
                'form' => $form->createView(),

         ]);
    }

    #[Route('/propriete/{title}', name:'properti')]
    public function show($title): Response
    {
        $property = $this->entityManager->getRepository(Property::class)->findOneByTitle($title);
        //$properties = $this->entityManager->getRepository(Property::class)->findOneByTitle($title);

        if (!$property){
            return $this->redirectToRoute('property');
        }

        return $this->render('property/show.html.twig', [
            'property' => $property,
            //'properties' => $properties
        ]);
    }
}
