<?php

namespace App\Domain\UseCase;

use App\Domain\Contract\Repository\IBookRepository;

class GetAllBooks
{
    public function __construct(
        private IBookRepository $bookRepository
    ) {}

    public function execute()
    {
        $data = $this->bookRepository->findAllBooks();
        
        return $data;
    }
}
