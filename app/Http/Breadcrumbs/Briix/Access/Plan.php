<?php

Breadcrumbs::register('briix.access.plan.index', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.dashboard');
    $breadcrumbs->push(trans('menus.briix.access.plans.management'), route('briix.access.plan.index'));
});

Breadcrumbs::register('briix.access.plan.create', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.plan.index');
    $breadcrumbs->push(trans('menus.briix.access.plans.create'), route('briix.access.plan.create'));
});

Breadcrumbs::register('briix.access.plan.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('briix.access.plan.index');
    $breadcrumbs->push(trans('menus.briix.access.plans.edit'), route('briix.access.plan.edit', $id));
});