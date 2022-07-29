<?php

namespace App\Domain\Contract\Repository;

interface BookRepositoryInterface
{
    public function createBook(string $title): void;
    public function findAllBooks(): array;
}