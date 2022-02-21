<?php

namespace App\Http\Controllers\FrontEnd\Pages;

use App\Http\Controllers\Controller;
use App\Http\Traits\Dashboard\uploadFiles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\AboutUs\Entities\AboutUs;
use Modules\ContactUs\Entities\ContactUs;
use Modules\ContactUs\Entities\FormContactUs;
use Modules\ContactUs\Http\Requests\Form\FormContactUsStoreRequest;
use Modules\Faq\Entities\Faq;
use Modules\Notices\Entities\Notice;
use Modules\Notices\Http\Requests\NoticesStoreRequest;
use Modules\WishLists\Entities\WishList;

class PagesController extends Controller
{
    use uploadFiles;

    public function about_us()
    {
        $about = AboutUs::orderby('id', 'DESC')->first();
        return view('FrontEnd.Pages.about-us', compact('about'));
    }

    public function contact_us()
    {
        $contact = ContactUs::orderby('id', 'DESC')->first();
        return view('FrontEnd.Pages.contact-us', compact('contact'));
    }

    public function form_contact(FormContactUsStoreRequest $request)
    {
        $model = new FormContactUs();
        $model->fill($request->only($model->getFillable()));
        $model->saveOrFail();

        Session::flash('success', ' پیام شما با موفقیت ارسال شد');
        return back();
    }

    public function faq()
    {
        $faqs = Faq::where('status', 1)->get();
        return view('FrontEnd.Pages.faq', compact('faqs'));
    }


    public function wishlist()
    {
        $wish = Wishlist::all();
        return view('FrontEnd.Users.wishList', compact('wish'));
    }

    public function add_wishlists(Request $request)
    {
        $wish = Wishlist::updateOrCreate([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),

        ]);
    }

    public function delete_wishlists($id)
    {
        Wishlist::where('id', $id)->forceDelete();
    }


    public function emailNotice(NoticesStoreRequest $request)
    {

        $model = new Notice;
        $model->fill($request->only($model->getFillable()));
        $model->saveOrFail();
        Session::flash('success', ' پیام شما با موفقیت ارسال شد');
        return back();
    }
}
