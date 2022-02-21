<?php


namespace Modules\Faq\Http\Services;

use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class FaqService
{
    public function breadCrumbs()
    {
        Breadcrumbs::for('list-faq', function ($trail) {
            $trail->push('لیست سوالات', route('admin.faq.index'));
        });

        Breadcrumbs::for('create-faq', function ($trail) {
            $trail->parent('list-faq');
            $trail->push('سوال جدید');
        });

        Breadcrumbs::for('edit-faq', function ($trail) {
            $trail->parent('list-faq');
            $trail->push('ویرایش سوال');
        });
    }
}
