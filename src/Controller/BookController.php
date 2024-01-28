<?php

namespace App\Controller;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
    #[Route('/api/books/{id}', name: 'deleteBook', methods: ['DELETE'])]
    public function DeleteBook(Book $book, EntityManagerInterface $em): JsonResponse 
    { 
        $em->remove($book);
        $em->flush();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }


      
    #[Route('/api/books', name:"createBook", methods: ['POST'])]
    public function createBook(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator): JsonResponse 
    {

        $book = $serializer->deserialize($request->getContent(), Book::class, 'json');
        $em->persist($book);
        $em->flush();

        $jsonBook = $serializer->serialize($book, 'json', ['groups' => 'getBooks']);
        
        $location = $urlGenerator->generate('detailBook', ['id' => $book->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonBook, Response::HTTP_CREATED, ["Location" => $location], true);
   }
}
