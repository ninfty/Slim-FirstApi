<?php

namespace App\Domain\UseCase;

use App\Domain\Contract\Repository\IBookRepository;
use App\Domain\Entity\Book;

class GetBook
{
    public function __construct(
        private IBookRepository $bookRepository
    ) {}

    public function execute(string $bookId): Book
    {
        $book = $this->bookRepository->findBookById($bookId);
        
        return $book;
    }
}
