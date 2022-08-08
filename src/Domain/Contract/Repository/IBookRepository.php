<?php

namespace App\Domain\Contract\Repository;

use App\Domain\Entity\Book;

interface IBookRepository
{
    public function findAllBooks(): array;
    public function findBookById(string $bookId): Book;
    public function createBook(string $title): void;
    public function updateBook(string $bookId, string $title): void;
    public function deleteBook(string $bookId): void;
}