<?php

namespace App\Infrastructure\Repository;

use App\Domain\Contract\Repository\BookRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use App\Domain\Entity\Book;

class BookRepository implements BookRepositoryInterface
{
    private EntityRepository $repository;

    public function __construct(EntityManager $entity_manager)
    {
        $this->repository = $entity_manager->getRepository(Book::class);
    }

    public function createBook(string $title): void
    {
        //
    }

    public function findAllBooks(): array
    {
        return $this->repository->findAll();
    }
}