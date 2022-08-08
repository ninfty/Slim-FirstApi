<?php

namespace App\Domain\UseCase;

use App\Domain\Contract\Repository\IBookRepository;

class UpdateBook
{
    public function __construct(
        private IBookRepository $bookRepository
    ) {}

    public function execute(string $bookId, string $title)
    {
        $book = $this->bookRepository->updateBook($bookId, $title);
        
        return $book;
    }
}
