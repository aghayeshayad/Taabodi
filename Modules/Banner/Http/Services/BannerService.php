<?php


namespace Modules\Banner\Http\Services;


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Spatie\Menu\Html;
use Spatie\Menu\Menu;

class BannerService
{
    public function breadCrumbs()
    {
        /**
         * Banner List
         */
        Breadcrumbs::for('list-banner', function ($trail) {
            $trail->push('لیست بنر ها', route('admin.banner.index'));
        });

        /**
         * Banner create
        */
        Breadcrumbs::for('create-banner', function ($trail) {
            $trail->parent('list-banner');
            $trail->push('افزودن بنر ها');
        });

        /**
         * Banner edit
         */
        Breadcrumbs::for('edit-banner', function ($trail) {
            $trail->parent('list-banner');
            $trail->push('ویرایش بنر ها');
        });

    }
}
