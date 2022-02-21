<?php


namespace Modules\SiteInformation\Http\Services;


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Spatie\Menu\Html;
use Spatie\Menu\Menu;

class SiteInformationService
{
    public function breadCrumbs()
    {
        /**
         * about List
         */
        Breadcrumbs::for('list-siteinformations', function ($trail) {
            $trail->push('لیست اطلاعات سایت', route('admin.siteinformation.index'));
        });

        /**
         * about create
         */
        Breadcrumbs::for('create-siteinformations', function ($trail) {
            $trail->parent('list-siteinformations');
            $trail->push('افزودن اطلاعات سایت');
        });

        /**
         * about edit
         */
        Breadcrumbs::for('edit-siteinformations', function ($trail) {
            $trail->parent('list-siteinformations');
            $trail->push('ویرایش اطلاعات سایت');
        });

    }
}
