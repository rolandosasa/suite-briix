<?php

Breadcrumbs::register('briix.access.ratePlan.index', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.dashboard');
    $breadcrumbs->push(trans('menus.briix.access.ratePlans.management'), route('briix.access.ratePlan.index'));
});

Breadcrumbs::register('admin.access.ratePlan.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.ratePlan.index');
    $breadcrumbs->push(trans('menus.briix.access.ratePlans.deactivated'), route('briix.access.ratePlan.deactivated'));
});

Breadcrumbs::register('briix.access.ratePlan.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.ratePlan.index');
    $breadcrumbs->push(trans('menus.briix.access.ratePlans.deleted'), route('briix.access.ratePlan.deleted'));
});

Breadcrumbs::register('briix.access.ratePlan.create', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.ratePlan.index');
    $breadcrumbs->push(trans('menus.briix.access.ratePlans.create'), route('briix.access.ratePlan.create'));
});

Breadcrumbs::register('briix.access.ratePlan.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('briix.access.ratePlan.index');
    $breadcrumbs->push(trans('menus.briix.access.ratePlans.edit'), route('briix.access.ratePlan.edit', $id));
});