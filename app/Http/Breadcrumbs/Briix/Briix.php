<?php

Breadcrumbs::register('briix.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('briix.dashboard'));
});

require __DIR__ . '/Access.php';
require __DIR__ . '/LogViewer.php';