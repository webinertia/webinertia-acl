<?php

/**
 * Trait for use within Controller classes
 */

declare(strict_types=1);

namespace Webinertia\Acl;

use Laminas\Permissions\Acl\Resource\ResourceInterface;

use function sprintf;

trait CheckActionAccessTrait
{
    public function isAllowed(
        ?ResourceInterface $resourceInterface = null,
        ?string $privilege = null
    ): bool {
        // set this as false
        $isAllowed = false;
        // if we pass a resourceInterface instance we need to use it
        if ($resourceInterface instanceof ResourceInterface) {
            $isAllowed = $this->acl->isAllowed(
                $this->identity()->getIdentity(),
                $resourceInterface,
                $privilege ?? $this->params()->fromRoute('action')
            );
        }
        // we did not pass a resourceInterface instance but this instance is a resourceInterface then check it
        if ($resourceInterface === null && $this instanceof ResourceInterface) {
            $isAllowed = $this->acl->isAllowed(
                $this->identity()->getIdentity(),
                $this,
                $privilege ?? $this->params()->fromRoute('action')
            );
        }
        return $isAllowed;
    }
}
