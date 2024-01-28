<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends AbstractController
{/*
    #[Route('/author', name: 'app_author')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AuthorController.php',
        ]);
    }
*/
    #[Route('/api/authors', name: 'author', methods: ['GET'])]
    public function getAuthors(AuthorRepository  $authorRepository,SerializerInterface $serializer): JsonResponse
    {
        $authors= $authorRepository->findAll();
        $authorsList= $serializer->serialize($authors,'json' , ['groups' => 'getBooks']);

        return new JsonResponse(
             $authorsList,
              Response::HTTP_OK, 
              [],
               true
        );

    }
    /*
    #[Route('/api/auhors/{id}', name: 'detailAuthors', methods: ['GET'])]
    public function getAuthor(Author $author, SerializerInterface $serializer): JsonResponse 
    {
        $jsonauthor = $serializer->serialize($author, 'json', ['groups' => 'getBooks']);
        return new JsonResponse($jsonauthor, Response::HTTP_OK, ['accept' => 'json'], true);
    }*/
    #[Route('/api/authors/{id}', name: 'detailAuthor', methods: ['GET'])]
    public function getDetailAuthor(Author $author, SerializerInterface $serializer) {
        $jsonAuthor = $serializer->serialize($author, 'json', ['groups' => 'getAuthors']);
        return new JsonResponse($jsonAuthor, Response::HTTP_OK, [], true);
    }
}
