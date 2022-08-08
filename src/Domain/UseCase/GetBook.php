<?php

namespace App\Domain\UseCase;

use App\Domain\Contract\Repository\IBookRepository;

class GetBook
{
    public function __construct(
        private IBookRepository $bookRepository
    ) {}

    public function execute(string $bookId)
    {
        $book = $this->bookRepository->findBookById($bookId);
        
        return $book;
    }
}
