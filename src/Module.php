<?php

declare(strict_types=1);

namespace Webinertia\Acl;

use Laminas\Permissions\Acl\AclInterface;

final class Module
{
    public function getConfig(): array
    {
        return [
            'service_manager' => [
                AclInterface::class      => AclFactory::class,
                Role\RoleProvider::class => Role\ProviderFactory::class,
            ],
            Role\Provider::class => [
                [
                    'roleId' => 'Guest',
                    'parent' => null,
                ],
                [
                    'roleId' => 'Member',
                    'parent' => 'Guest',
                ],
                [
                    'roleId' => 'Employee',
                    'parent' => 'Member',
                ],
                [
                    'roleId' => 'Staff',
                    'parent' => 'Member',
                ],
                [
                    'roleId' => 'Supervisor',
                    'parent' => ['Employee', 'Staff']
                ],
                'Administrator' => [
                    'roleId' => 'Administrator',
                    'parent' => 'Supervisor',
                ],
                'Super Administrator' => [
                    'roleId' => 'Super Administrator',
                    'parent' => 'Administrator',
                ],
            ],
        ];
    }
}