<?php

Breadcrumbs::register('admin.access.enterprise.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.enterprises.management'), route('admin.access.enterprise.index'));
});

Breadcrumbs::register('admin.access.enterprise.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.enterprise.index');
    $breadcrumbs->push(trans('menus.backend.access.enterprises.deactivated'), route('admin.access.enterprise.deactivated'));
});

Breadcrumbs::register('admin.access.enterprise.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.enterprise.index');
    $breadcrumbs->push(trans('menus.backend.access.enterprises.deleted'), route('admin.access.enterprise.deleted'));
});

Breadcrumbs::register('admin.access.enterprise.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.enterprise.index');
    $breadcrumbs->push(trans('menus.backend.access.enterprises.create'), route('admin.access.enterprise.create'));
});

Breadcrumbs::register('admin.access.enterprise.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.enterprise.index');
    $breadcrumbs->push(trans('menus.backend.access.enterprises.edit'), route('admin.access.enterprise.edit', $id));
});