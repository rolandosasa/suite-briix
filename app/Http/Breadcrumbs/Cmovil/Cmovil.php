<?php

Breadcrumbs::register('cmovil.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('cmovil.dashboard'));
});

require __DIR__ . '/Access.php';
require __DIR__ . '/LogViewer.php';