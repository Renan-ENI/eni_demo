<?php

namespace App\Controller;

use App\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route ("/product/{id}", name="app_product")
     */
    public function product($id) : Response
    {
            // afficher du texte
        return new Response ("L'id du produit est : ".$id);

    }

    /**
     * @Route ("/creat-person", name="app_creat_person")
     */
    public function createPerson() : Response
    {
        $person = new Person();
        $person->setName("Toto");
        $person->setFirstname( "Binouse");
        $person->setAge(45);

        $em = $this->getDoctrine()->getManager();

        $em->persist($person);
        $em->flush();

        return $this->render('home/index.html.twig');

    }

    /**
     * @Route ("/select-person/{id}", name="app_select_person")
     */
    public function selectPerson($id) : Response
    {

        $repoPerson = $this->getDoctrine()->getRepository(Person::class);
        $person = $repoPerson->find($id);

        return new Response("Personne :".$person->getName());

    }

    /**
     * @Route ("/product/{id}", name="app_product")
     */
    public function productDetail($id) : Response
    {
        $repoArticle = $this->getDoctrine()->getRepository(Person::class);

        // afficher du texte
        return new Response ("L'id du produit est : ".$id);

    }

}
