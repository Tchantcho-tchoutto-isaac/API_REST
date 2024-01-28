<?php

namespace App\Controller;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
class BookController extends AbstractController
{
    #[Route('/api/books', name: 'book', methods: ['GET'])]
    public function getBooks(BookRepository $bookRepository,SerializerInterface $serializer): JsonResponse
    {
        $books= $bookRepository->findAll();
        $bookList= $serializer->serialize($books,'json' , ['groups' => 'getBooks']);

        return new JsonResponse(
             $bookList,
              Response::HTTP_OK, 
              [],
               true
        );

    }

    /*
    #[Route('/api/books/{id}', name: 'detail', methods: ['GET'])]
    public function getBookdetail( int $id , BookRepository $bookRepository,SerializerInterface $serializer): JsonResponse
    {
        $books= $bookRepository->find($id);
        if ($books) {

        $bookList= $serializer->serialize($books,'json');
        return new JsonResponse($bookList,Response::HTTP_OK, [],true);

        return new JsonResponse(null , Response::HTTP_NOT_FOUND );
         }
       
    }*/

    #[Route('/api/books/{id}', name: 'detailBook', methods: ['GET'])]
    public function getDetailBook(Book $book, SerializerInterface $serializer): JsonResponse 
    {
        $jsonBook = $serializer->serialize($book, 'json', ['groups' => 'getBooks']);
        return new JsonResponse($jsonBook, Response::HTTP_OK, ['accept' => 'json'], true);
    }
}
