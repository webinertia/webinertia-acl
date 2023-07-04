<?php

declare(strict_types=1);

namespace Webinertia\Acl\Role;

use Laminas\Permissions\Acl\Role\GenericRole;

final class Role extends GenericRole
{
    /** @var string|array $parent */
    protected $parent;

    public function __construct(
        protected array $data
    ) {
        foreach ($data as $k => $v) {
            $this->{$k} = $v;
        }
    }

    public function getParent(): string|array
    {
        return $this->parent;
    }
}
