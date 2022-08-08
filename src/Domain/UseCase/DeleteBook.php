<?php

namespace App\Domain\UseCase;

use App\Domain\Contract\Repository\IBookRepository;

class DeleteBook
{
    public function __construct(
        private IBookRepository $bookRepository
    ) {}

    public function execute(string $bookId): void
    {
        $this->bookRepository->deleteBook($bookId);
    }
}
