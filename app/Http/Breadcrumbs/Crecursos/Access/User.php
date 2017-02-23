<?php

Breadcrumbs::register('crecursos.access.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('crecursos.dashboard');
    $breadcrumbs->push(trans('labels.backend.access.users.management'), route('crecursos.access.user.index'));
});

Breadcrumbs::register('crecursos.access.user.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('crecursos.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deactivated'), route('crecursos.access.user.deactivated'));
});

Breadcrumbs::register('crecursos.access.user.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('crecursos.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deleted'), route('crecursos.access.user.deleted'));
});

Breadcrumbs::register('crecursos.access.user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('crecursos.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.create'), route('crecursos.access.user.create'));
});

Breadcrumbs::register('crecursos.access.user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('crecursos.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.edit'), route('crecursos.access.user.edit', $id));
});

Breadcrumbs::register('crecursos.access.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('crecursos.access.user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.change-password'), route('crecursos.access.user.change-password', $id));
});
