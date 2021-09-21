<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Movie;
use App\Entity\Casting;
use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;

class CastingController extends AbstractController
{
    /**
     * @Route("/casting/create")
     */
    public function create(EntityManagerInterface $em)
    {      
        $person = new Person();
        $person->setName('Chris Pratt');

        $movie = new Movie();
        $movie->setTitle('Les gardiens de la galaxy 2');

        $casting = new Casting();
        $casting->setOrderCredit(1);
        $casting->setRole('Star Lord');

        //relation casting
        $casting->setPerson($person);
        $casting->setMovie($movie);

        $em->persist($casting);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }
}
