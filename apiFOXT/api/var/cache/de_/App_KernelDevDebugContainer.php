<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXnOUMlK\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXnOUMlK/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXnOUMlK.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXnOUMlK\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerXnOUMlK\App_KernelDevDebugContainer([
    'container.build_hash' => 'XnOUMlK',
    'container.build_id' => 'e5bd9eef',
    'container.build_time' => 1647848825,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXnOUMlK');
