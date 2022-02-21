<?php

namespace Modules\ContactUs\Http\Controllers;

use App\Http\Traits\Dashboard\uploadFiles;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\ContactUs\Entities\ContactUs;
use Modules\ContactUs\Http\Requests\ContactUsStoreRequest;
use Modules\ContactUs\Http\Requests\ContactUsUpdateRequest;
use Yajra\DataTables\DataTables;

class ContactUsController extends Controller
{
    use uploadFiles;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contactus::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param ContactUs $contact
     * @return Renderable
     */
    public function create(ContactUs $contact)
    {
        return view('contactus::create', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ContactUsStoreRequest $request
     * @param ContactUs $contact
     * @return Renderable
     */
    public function store(ContactUsStoreRequest $request, ContactUs $contact)
    {
        $this->fillRequest($request, $contact);

        session()->flash('success', 'اطلاعات تماس با ما مورد نظر با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $contact = ContactUs::findOrFail($id);
        return view('contactus::edit', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contactus::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param ContactUsUpdateRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(ContactUsUpdateRequest $request, $id)
    {
        $contact = ContactUs::findOrFail($id);
        $this->fillRequest($request, $contact);

        session()->flash('success', 'اطلاعات تماس با ما مورد نظر با موفقیت ویرایش گردید.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        ContactUs::findOrFail($id)->delete();

        return  response('Ok!Deleted ContactUs successfully!', Response::HTTP_OK);
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        ContactUs::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!Restored ContactUs successfully!', Response::HTTP_OK);
    }

    /**
     * Return contents list data
     */
    public function list()
    {
        return DataTables::of(ContactUs::withTrashed())
            ->addColumn('actions', function ($contact) {
                return $this->actionColumn($contact);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Contents list action column
     *
     * @param ContactUs $contact
     * @return Response
     */
    private function actionColumn($contact)
    {
        return view('contactus::partials.action_column', compact('contact'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var ContactUs $model
         * @var Request $request
         */
        $model->fill($request->only($model->getFillable()));
        $model->saveOrFail();
    }
}
