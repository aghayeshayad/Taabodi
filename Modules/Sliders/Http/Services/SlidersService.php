<?php


namespace Modules\Sliders\Http\Services;


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Spatie\Menu\Html;
use Spatie\Menu\Menu;
use function foo\func;

class SlidersService
{
    public function breadCrumbs()
    {
        /**
         * Slider list
        */
        Breadcrumbs::for('list-slider', function ($trail) {
            $trail->push('لیست اسلایدرها', route('admin.slider.index'));
        });

        /**
         * Slider create
        */
        Breadcrumbs::for('create-slider', function($trail) {
            $trail->parent('list-slider');
            $trail->push('افزودن اسلایدر');
        });

        /**
         * Slider edit
         */
        Breadcrumbs::for('edit-slider', function($trail) {
            $trail->parent('list-slider');
            $trail->push('ویرایش اسلایدر');
        });
    }
}