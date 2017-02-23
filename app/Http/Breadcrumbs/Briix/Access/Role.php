<?php

Breadcrumbs::register('briix.access.role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.dashboard');
    $breadcrumbs->push(trans('menus.briix.access.roles.management'), route('briix.access.role.index'));
});

Breadcrumbs::register('briix.access.role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.role.index');
    $breadcrumbs->push(trans('menus.briix.access.roles.create'), route('briix.access.role.create'));
});

Breadcrumbs::register('briix.access.role.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('briix.access.role.index');
    $breadcrumbs->push(trans('menus.briix.access.roles.edit'), route('briix.access.role.edit', $id));
});