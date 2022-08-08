<?php

namespace App\Infrastructure\Repository\Doctrine;

use App\Domain\Contract\Repository\IBookRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use App\Domain\Entity\Book;

class BookRepository implements IBookRepository
{
    private EntityRepository $repository;

    public function __construct(EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository(Book::class);
    }

    public function findAllBooks(): array
    {
        return $this->repository->findAll();
    }

    public function findBookById(string $bookId): Book
    {
        return $this->repository->findOneBy(['id' => $bookId]);
    }

    public function createBook(string $title): void
    {
        //
    }

    public function updateBook(string $bookId, string $title): void
    {
        $this->repository->createQueryBuilder('book')
                ->update()
                ->set('book.title', ':title')
                ->where('book.id = :bookId')
                ->setParameter('title', $title)
                ->setParameter('bookId', $bookId)
                ->getQuery()
                ->execute();
    }

    public function deleteBook(string $bookId): void
    {
        $this->repository->createQueryBuilder('book')
                ->delete()
                ->where('book.id = :bookId')
                ->setParameter('bookId', $bookId)
                ->getQuery()
                ->execute();
    }
}