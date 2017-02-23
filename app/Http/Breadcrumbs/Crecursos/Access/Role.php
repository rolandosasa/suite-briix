<?php

Breadcrumbs::register('crecursos.access.role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('crecursos.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.roles.management'), route('crecursos.access.role.index'));
});

Breadcrumbs::register('crecursos.access.role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('crecursos.access.role.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.create'), route('crecursos.access.role.create'));
});

Breadcrumbs::register('crecursos.access.role.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('crecursos.access.role.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.edit'), route('crecursos.access.role.edit', $id));
});