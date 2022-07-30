<?php

use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;
use function DI\autowire;
use App\Domain\Contract\Repository\IBookRepository;
use App\Infrastructure\Repository\Doctrine\BookRepository;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        IBookRepository::class => autowire(BookRepository::class),
    ]);
};