<?php

Breadcrumbs::register('cmovil.access.role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('cmovil.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.roles.management'), route('cmovil.access.role.index'));
});

Breadcrumbs::register('cmovil.access.role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('cmovil.access.role.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.create'), route('cmovil.access.role.create'));
});

Breadcrumbs::register('cmovil.access.role.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('cmovil.access.role.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.edit'), route('cmovil.access.role.edit', $id));
});