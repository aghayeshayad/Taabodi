<?php


namespace Modules\ContactUs\Http\Services;


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Spatie\Menu\Html;
use Spatie\Menu\Menu;

class ContactUsService
{
    public function breadCrumbs()
    {
        /**
         * contact List
         */
        Breadcrumbs::for('list-contact', function ($trail) {
            $trail->push('لیست تماس با ما', route('admin.contactus.index'));
        });

        /**
         * contact create
        */
        Breadcrumbs::for('create-contact', function ($trail) {
            $trail->parent('list-contact');
            $trail->push('افزودن تماس با ما');
        });

        /**
         * about edit
         */
        Breadcrumbs::for('edit-contact', function ($trail) {
            $trail->parent('list-contact');
            $trail->push('ویرایش تماس با ما');
        });

        /**
         * form-contact List
         */
        Breadcrumbs::for('list-form-contact', function ($trail) {
            $trail->push('لیست فرم تماس با ما', route('admin.form-contact.index'));
        });

        /**
         * form-contact create
         */
        Breadcrumbs::for('create-form-contact', function ($trail) {
            $trail->parent('list-form-contact');
            $trail->push('افزودن فرم تماس با ما');
        });

        /**
         * form-contact edit
         */
        Breadcrumbs::for('edit-form-contact', function ($trail) {
            $trail->parent('list-form-contact');
            $trail->push('ویرایش فرم تماس با ما');
        });

    }
}
