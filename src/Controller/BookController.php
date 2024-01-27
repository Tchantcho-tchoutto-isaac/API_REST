<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class BookController extends AbstractController
{
    #[Route('/api/books', name: 'book', methods: ['GET'])]
    public function index(BookRepository $bookRepository,SerializerInterface $serializer): JsonResponse
    {
        $books= $bookRepository->findAll();
        $bookList= $serializer->serialize($books,'json');

        return new JsonResponse(
             $bookList,
              Response::HTTP_OK, 
              [],
               true
        );

    }
}
