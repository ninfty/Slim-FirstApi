<?php

namespace App\Domain\UseCase;

use App\Domain\Contract\Repository\IBookRepository;
use App\Domain\Entity\Book;

class CreateBook
{
    public function __construct(
        private IBookRepository $bookRepository
    ) {}

    public function execute(string $title): Book
    {
        $book = $this->bookRepository->createBook($title);
        
        return $book;
    }
}
