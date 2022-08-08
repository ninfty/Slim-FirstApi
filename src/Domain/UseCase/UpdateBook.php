<?php

namespace App\Domain\UseCase;

use App\Domain\Contract\Repository\IBookRepository;
use App\Domain\Entity\Book;

class UpdateBook
{
    public function __construct(
        private IBookRepository $bookRepository
    ) {}

    public function execute(string $bookId, string $title): Book
    {
        $this->bookRepository->updateBook($bookId, $title);

        $book = $this->bookRepository->findBookById($bookId);
        
        return $book;
    }
}
