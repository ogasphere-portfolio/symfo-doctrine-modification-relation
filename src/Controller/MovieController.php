<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Movie;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MovieController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $movies = $this->getDoctrine()->getRepository(Movie::class)->findAll();

        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    /**
     * @Route("/movie/{id}/show/", name="movie_show")
     */
    public function showAction(Movie $movie)
    {   
        return $this->render('movie/show.html.twig',[
            'movie' => $movie
        ]);
    }

    /**
     * @Route("/movie/create", name="movie_create")
     */
    public function create(EntityManagerInterface $em)
    {
        $genre1 = new Genre;
        $genre1->setName('Drame');

        $genre2 = new Genre;
        $genre2->setName('Film francais');

        $movie = new Movie;
        $movie->setTitle('Taxi 4');

        $movie->addGenre($genre1); 
        $movie->addGenre($genre2); 

        $em->persist($movie);

        $em->flush();

        return $this->redirectToRoute('homepage');
    }
}
