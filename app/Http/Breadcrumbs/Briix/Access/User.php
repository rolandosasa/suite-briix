<?php

Breadcrumbs::register('briix.access.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.dashboard');
    $breadcrumbs->push(trans('labels.briix.access.users.management'), route('briix.access.user.index'));
});

Breadcrumbs::register('briix.access.user.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.user.index');
    $breadcrumbs->push(trans('menus.briix.access.users.deactivated'), route('briix.access.user.deactivated'));
});

Breadcrumbs::register('briix.access.user.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.user.index');
    $breadcrumbs->push(trans('menus.briix.access.users.deleted'), route('briix.access.user.deleted'));
});

Breadcrumbs::register('briix.access.user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.user.index');
    $breadcrumbs->push(trans('menus.briix.access.users.create'), route('briix.access.user.create'));
});

Breadcrumbs::register('briix.access.user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('briix.access.user.index');
    $breadcrumbs->push(trans('menus.briix.access.users.edit'), route('briix.access.user.edit', $id));
});

Breadcrumbs::register('briix.access.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('briix.access.user.index');
    $breadcrumbs->push(trans('menus.briix.access.users.change-password'), route('briix.access.user.change-password', $id));
});
