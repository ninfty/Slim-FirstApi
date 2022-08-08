<?php

namespace App\Infrastructure\Repository\Doctrine;

use App\Domain\Contract\Repository\IBookRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use App\Domain\Entity\Book;

class BookRepository implements IBookRepository
{
    private EntityRepository $repository;

    public function __construct(EntityManager $entity_manager)
    {
        $this->repository = $entity_manager->getRepository(Book::class);
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
        //
    }

    public function deleteBook(string $bookId): void
    {
        //
    }
}