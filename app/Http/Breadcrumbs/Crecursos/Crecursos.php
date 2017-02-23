<?php

Breadcrumbs::register('crecursos.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('crecursos.dashboard'));
});

require __DIR__ . '/Access.php';
require __DIR__ . '/LogViewer.php';