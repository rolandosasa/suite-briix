<?php

Breadcrumbs::register('cmovil.access.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('cmovil.dashboard');
    $breadcrumbs->push(trans('labels.backend.access.users.management'), route('cmovil.access.user.index'));
});

Breadcrumbs::register('cmovil.access.user.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('cmovil.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deactivated'), route('cmovil.access.user.deactivated'));
});

Breadcrumbs::register('cmovil.access.user.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('cmovil.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deleted'), route('cmovil.access.user.deleted'));
});

Breadcrumbs::register('cmovil.access.user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('cmovil.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.create'), route('cmovil.access.user.create'));
});

Breadcrumbs::register('cmovil.access.user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('cmovil.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.edit'), route('cmovil.access.user.edit', $id));
});

Breadcrumbs::register('cmovil.access.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('cmovil.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.change-password'), route('cmovil.access.user.change-password', $id));
});
