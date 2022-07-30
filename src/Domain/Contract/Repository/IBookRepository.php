<?php

namespace App\Domain\Contract\Repository;

interface IBookRepository
{
    public function createBook(string $title): void;
    public function findAllBooks(): array;
}