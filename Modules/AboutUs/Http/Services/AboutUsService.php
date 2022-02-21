<?php


namespace Modules\AboutUs\Http\Services;


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Spatie\Menu\Html;
use Spatie\Menu\Menu;

class AboutUsService
{
    public function breadCrumbs()
    {
        /**
         * about List
         */
        Breadcrumbs::for('list-about', function ($trail) {
            $trail->push('لیست درباره ما', route('admin.aboutus.index'));
        });

        /**
         * about create
        */
        Breadcrumbs::for('create-about', function ($trail) {
            $trail->parent('list-about');
            $trail->push('افزودن درباره ما');
        });

        /**
         * about edit
         */
        Breadcrumbs::for('edit-about', function ($trail) {
            $trail->parent('list-about');
            $trail->push('ویرایش درباره ما');
        });

    }
}
