<?php


namespace Modules\Rule\Http\services;


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Spatie\Menu\Html;
use Spatie\Menu\Menu;

class RuleService
{
    public function menu()
    {
        $rule_route = route('admin.rule.index');

        return Menu::new()->withoutWrapperTag()->add(Html::raw("
                          <li class='kt-menu__item  kt-menu__item--submenu'
                            aria-haspopup='true' data-ktmenu-submenu-toggle='hover'>
                            <a href='$rule_route' class='kt-menu__link kt-menu__toggle'>
                                <i class='kt-menu__link-icon flaticon2-image-file'></i>
                                <span class='kt-menu__link-text'>قوانین و مقررات</span>
                                <i class='kt-menu__ver-arrow la la-angle-left'></i>
                            </a>
                        </li>"));
    }

    public function breadCrumbs()
    {
        /**
         * Slider list
         */
        Breadcrumbs::for('list-rule', function ($trail) {
            $trail->push('لیست قوانینا', route('admin.rule.index'));
        });

        /**
         * rule1 create
         */

        Breadcrumbs::for('create-rule', function($trail) {
            $trail->parent('list-rule');
            $trail->push('افزودن قانون');
        });

        /**
         * Slider edit
         */
        Breadcrumbs::for('edit-rule', function($trail) {
            $trail->parent('list-rule');
            $trail->push('ویرایش قانون');
        });
    }
}