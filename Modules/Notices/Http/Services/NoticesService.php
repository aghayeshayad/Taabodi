<?php


namespace Modules\Notices\Http\Services;


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Spatie\Menu\Html;
use Spatie\Menu\Menu;

class NoticesService
{
    public function breadCrumbs()
    {
        /**
         * Banner List
         */
        Breadcrumbs::for('list-notices', function ($trail) {
            $trail->push('لیست خبرنامه ها', route('admin.notices.index'));
        });

        /**
         * Banner create
        */
        Breadcrumbs::for('create-notices', function ($trail) {
            $trail->parent('list-notices');
            $trail->push('افزودن خبرنامه ها');
        });

        /**
         * Banner edit
         */
        Breadcrumbs::for('edit-notices', function ($trail) {
            $trail->parent('list-notices');
            $trail->push('ویرایش خبرنامه ها');
        });

    }
}
