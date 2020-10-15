<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Contact;
use App\Entity\Produit;
use App\Entity\User;
use App\Form\ProduitType;
use App\Repository\CommandeRepository;
use App\Repository\ContactRepository;
use App\Repository\ProduitRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 *
 */
class AdminController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ContactRepository
     */
    private $repositoryC;
    /**
     * @var ProduitRepository
     */
    private $repositoryP;


    public function __construct(EntityManagerInterface $em, ProduitRepository $repositoryP,ContactRepository $repositoryC)
    {
      $this->em =   $em ;
      $this->repositoryP = $repositoryP;
      $this->repositoryC = $repositoryC;

    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/list" , name="produit.list")
     * @return Response
     */
    public  function list()
    {
        $produits = $this->repositoryP->findAll();
        return $this->render('admin/list.html.twig',[
            'produits' => $produits

        ]);
    }

    /**
     * @Route("/edit_{id}" , name="produit.edit", methods="GET|POST")
     * @param Request $request
     * @param Produit $produit
     * @return Response
     */
    public function edit(Request $request,Produit $produit)
    {
        $form = $this->createForm(ProduitType::class,$produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() )
        {
            $this->em->flush();
            $this->addFlash('success' , 'Modifier avec succes  ');
            return $this->redirectToRoute('produit.list');
        }
        return $this->render('admin/edit.html.twig',[
            'form' => $form->createView(),
            'produit' => $produit
        ]);
    }

    /**
     * @Route("/new_{id}" , name="produit.new")
     * @param $id
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function new($id,Request $request,User $user)
    {
        $produit =new Produit();
        $form = $this->createForm(ProduitType::class,$produit);
        $form->handleRequest($request);
        if ($form->isSubmitted()  && $form->isValid() )
        {
            $produit->setIduser($user);
            $this->em->persist($produit);
            $this->em->flush();
            $this->addFlash('success' , 'Enregistrer  avec success');
            return $this->redirectToRoute('produit.list');
        }

        return $this->render('admin/new.html.twig',[
            'form' => $form->createView() ,
        ]);
    }

    /**
     * @Route("delete_{id}",name="produit.delete")
     * @param Produit $produit
     */
    public function delete(Produit $produit)
    {
        $this->em->remove($produit);
        $this->em->flush();
        $this->addFlash('success' , 'supprimer  avec success');
        return $this->redirectToRoute('produit.list');
    }

    /**
     * @Route("/contact" , name="admin.contact")
     * @return Response
     */
    public function Contact(UserRepository $repository)
    {
        $contacts = $this->repositoryC->findAll();
        return $this->render('admin/contact.html.twig', [
            'contacts' => $contacts
        ]);
    }
    /**
     * @Route("deleteContact_{id}", name="Contact.delete")
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function deleteContact(Contact $contact)
    {

        $this->em->remove($contact);
        $this->em->flush();
        return $this->redirectToRoute('admin.contact');
    }

    /**
     * @Route("/commande" , name="commande.list")
     * @param CommandeRepository $commandeRepository
     * @return Response
     */
    public function commande(CommandeRepository $commandeRepository)
    {
        $commandes = $commandeRepository->findAll();
        return $this->render('admin/commande.html.twig',[
            'commandes' => $commandes
        ]);

    }

    /**
     * //* @Route("/commandedelet_{id}" , name="commande.delete")
     * //
     * @param Commande $commande
     * @return RedirectResponse
     */
    public function commandedelete(Commande $commande)
    {
        $this->em->remove($commande);
        $this->em->flush();
        return $this->redirectToRoute('commande.list');
    }
}
