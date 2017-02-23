<?php

Breadcrumbs::register('briix.access.contract.index', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.dashboard');
    $breadcrumbs->push(trans('menus.briix.access.contracts.management'), route('briix.access.contract.index'));
});

Breadcrumbs::register('briix.access.contract.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.contract.index');
    $breadcrumbs->push(trans('menus.briix.access.contracts.deactivated'), route('briix.access.contract.deactivated'));
});

Breadcrumbs::register('briix.access.contract.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.contract.index');
    $breadcrumbs->push(trans('menus.briix.access.contracts.deleted'), route('briix.access.contract.deleted'));
});

Breadcrumbs::register('briix.access.contract.create', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.contract.index');
    $breadcrumbs->push(trans('menus.briix.access.contracts.create'), route('briix.access.contract.create'));
});

Breadcrumbs::register('briix.access.contract.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('briix.access.contract.index');
    $breadcrumbs->push(trans('menus.briix.access.contracts.edit'), route('briix.access.contract.edit', $id));
});