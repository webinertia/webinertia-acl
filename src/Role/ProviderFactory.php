<?php

declare(strict_types=1);

namespace Webinertia\Acl\Role;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

final class ProviderFactory implements FactoryInterface
{
        /** @inheritDoc */
        public function __invoke(
            ContainerInterface $container,
            $requestedName,
            ?array $options = null
        ): RoleProvider {
            return new $requestedName($container->get('config')[RoleProvider::class]);
        }
}