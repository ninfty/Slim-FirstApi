<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        EntityManager::class => function (ContainerInterface $container): EntityManager {
            $settings = $container->get('settings');
            
            $config = ORMSetup::createAnnotationMetadataConfiguration(
                $settings['doctrine']['metadata_dirs'],
                $settings['doctrine']['dev_mode']
            );
        
            return EntityManager::create(
                $settings['doctrine']['connection'],
                $config
            );
        }
    ]);
};