<?php

Breadcrumbs::register('briix.access.enterprise.index', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.dashboard');
    $breadcrumbs->push(trans('menus.briix.access.enterprises.management'), route('briix.access.enterprise.index'));
});

Breadcrumbs::register('briix.access.enterprise.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.enterprise.index');
    $breadcrumbs->push(trans('menus.briix.access.enterprises.deactivated'), route('briix.access.enterprise.deactivated'));
});

Breadcrumbs::register('briix.access.enterprise.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.enterprise.index');
    $breadcrumbs->push(trans('menus.briix.access.enterprises.deleted'), route('briix.access.enterprise.deleted'));
});

Breadcrumbs::register('admin.access.enterprise.create', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.enterprise.index');
    $breadcrumbs->push(trans('menus.briix.access.enterprises.create'), route('briix.access.enterprise.create'));
});

Breadcrumbs::register('briix.access.enterprise.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('briix.access.enterprise.index');
    $breadcrumbs->push(trans('menus.briix.access.enterprises.edit'), route('briix.access.enterprise.edit', $id));
});