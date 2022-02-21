<?php

use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use \Nwidart\Modules\Facades\Module;

Breadcrumbs::for('home', function ($trail) {

});

foreach (Module::allEnabled() as $key => $value) {
    $service = "Modules\\$key\Http\Services\\$key"."Service";
    if (Module::has($key) && class_exists($service)) {
        $service = new $service;
        $service->breadCrumbs();
    }
}

Breadcrumbs::for('list-roles', function ($trail) {
    $trail->push('لیست نقش ها', route('admin.roles.index'));
});

Breadcrumbs::for('create-roles', function ($trail) {
    $trail->parent('list-roles');
    $trail->push('نقش جدید');
});

Breadcrumbs::for('edit-roles', function ($trail) {
    $trail->parent('list-roles');
    $trail->push('ویرایش نقش');
});

Breadcrumbs::for('list-users', function ($trail) {
    $trail->push('لیست کاربران', route('admin.users.index'));
});

Breadcrumbs::for('create-users', function ($trail) {
    $trail->parent('list-users');
    $trail->push('کاربر جدید');
});

Breadcrumbs::for('edit-users', function ($trail) {
    $trail->parent('list-users');
    $trail->push('ویرایش کاربر');
});
