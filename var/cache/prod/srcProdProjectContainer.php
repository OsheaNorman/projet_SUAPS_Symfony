<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container7NO9AxN\srcProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container7NO9AxN/srcProdProjectContainer.php') {
    touch(__DIR__.'/Container7NO9AxN.legacy');

    return;
}

if (!\class_exists(srcProdProjectContainer::class, false)) {
    \class_alias(\Container7NO9AxN\srcProdProjectContainer::class, srcProdProjectContainer::class, false);
}

return new \Container7NO9AxN\srcProdProjectContainer(array(
    'container.build_hash' => '7NO9AxN',
    'container.build_id' => '5328156a',
    'container.build_time' => 1541689791,
), __DIR__.\DIRECTORY_SEPARATOR.'Container7NO9AxN');
