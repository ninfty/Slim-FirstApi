<?php

namespace App\Domain\UseCase;

use App\Infrastructure\Repository\BookRepository;

class GetAllBooks
{
    public function __construct(
        private BookRepository $bookRepository
    ) {}

    public function execute()
    {
        $data = $this->bookRepository->findAllBooks();
        
        return $data;
    }
}
