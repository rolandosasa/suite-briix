<?php

Breadcrumbs::register('briix.access.discountPlan.index', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.dashboard');
    $breadcrumbs->push(trans('menus.briix.access.discountPlans.management'), route('briix.access.discountPlan.index'));
});

Breadcrumbs::register('admin.access.discountPlan.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.discountPlan.index');
    $breadcrumbs->push(trans('menus.briix.access.discountPlans.deactivated'), route('briix.access.discountPlan.deactivated'));
});

Breadcrumbs::register('briix.access.discountPlan.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.discountPlan.index');
    $breadcrumbs->push(trans('menus.briix.access.discountPlans.deleted'), route('briix.access.discountPlan.deleted'));
});

Breadcrumbs::register('briix.access.discountPlan.create', function ($breadcrumbs) {
    $breadcrumbs->parent('briix.access.discountPlan.index');
    $breadcrumbs->push(trans('menus.briix.access.discountPlans.create'), route('briix.access.discountPlan.create'));
});

Breadcrumbs::register('briix.access.discountPlan.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('briix.access.discountPlan.index');
    $breadcrumbs->push(trans('menus.briix.access.discountPlans.edit'), route('briix.access.discountPlan.edit', $id));
});