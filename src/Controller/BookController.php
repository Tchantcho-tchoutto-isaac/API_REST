<?php

namespace App\Controller;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\BookRepository;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;


class BookController extends AbstractController
{
    #[Route('/api/books', name: 'book', methods: ['GET'])]
   /* #[IsGranted('ROLE_ADMIN', message: 'Vous n\'avez pas les droits suffisants pour créer un livre')]*/
    public function getBooks(BookRepository $bookRepository,SerializerInterface $serializer , Request $request): JsonResponse
    {   
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 8);
        $books = $bookRepository->findAllWithPagination($page, $limit);
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
   public function createBook(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator, AuthorRepository $authorRepository): JsonResponse 
   {
       $book = $serializer->deserialize($request->getContent(), Book::class, 'json');

       // Récupération de l'ensemble des données envoyées sous forme de tableau
       $content = $request->toArray();

       // Récupération de l'idAuthor. S'il n'est pas défini, alors on met -1 par défaut.
       $idAuthor = $content['idAuthor'] ?? -1;

       // On cherche l'auteur qui correspond et on l'assigne au livre.
       // Si "find" ne trouve pas l'auteur, alors null sera retourné.
       $book->setAuthor($authorRepository->find($idAuthor));
    
       $em->persist($book);
       $em->flush();

       $jsonBook = $serializer->serialize($book, 'json', ['groups' => 'getBooks']);

       $location = $urlGenerator->generate('detailBook', ['id' => $book->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

       return new JsonResponse($jsonBook, Response::HTTP_CREATED, ["Location" => $location], true);
   }
   
   
    #[Route('/api/books/{id}', name:"updateBook", methods:['PUT'])]

    public function updateBook(Request $request, SerializerInterface $serializer, Book $currentBook, EntityManagerInterface $em,  AuthorRepository $authorRepository): JsonResponse 
    {
        $updatedBook = $serializer->deserialize($request->getContent(), 
                Book::class, 
                'json', 
                [AbstractNormalizer::OBJECT_TO_POPULATE => $currentBook]);
        $content = $request->toArray();
        $idAuthor = $content['idAuthor'] ?? -1;
        $updatedBook->setAuthor($authorRepository->find($idAuthor));
        
        $em->persist($updatedBook);
        $em->flush();
        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
   }
}
