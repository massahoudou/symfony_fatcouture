<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Contact;
use App\Form\CommandeType;
use App\Form\CommendeType;
use App\Form\ContactType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var ProduitRepository
     */
    private $repository;

    public  function __construct(EntityManagerInterface $em,ProduitRepository $repository)
    {
        $this->em = $em ;
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="home")
     * @param ProduitRepository $repository
     * @param Request $request
     * @return Response
     */
    public function index(ProduitRepository $repository, Request $request)
    {
        $contact = new Contact();

        $produits = $repository->findAll();

        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);


        if ( $form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($contact);
            $this->em->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'produits' => $produits,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show_{id}" , name="produit.show")
     * @param $id
     * @param ProduitRepository $repository
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public  function show($id ,ProduitRepository $repository,Request $request)
    {

        $commande = new Commande();
        $produits = $repository->findAll();
        $produit = $repository->find($id);

        $form = $this->createForm(CommandeType::class,$commande);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $commande->setIdproduit($produit);
            $this->em->persist($commande);
            $this->em->flush();
            return $this->redirectToRoute('produit.show',[
                'id' => $id]);
        }


        return $this->render('home/show.html.twig', [
            'controller_name' => 'HomeController',
            'produits' => $produits,
            'produit1' => $produit,
            'form' => $form->createView()
        ]);
    }
}
