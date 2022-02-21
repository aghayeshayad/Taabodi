<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\ContactUs\Entities\FormContactUs;
use Modules\ContactUs\Http\Requests\Form\FormContactUsStoreRequest;
use Modules\ContactUs\Http\Requests\Form\FormContactUsUpdateRequest;
use Yajra\DataTables\DataTables;

class FormContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contactus::Form.index');
    }

    /**
     * Show the form for creating a new resource.
     * @param FormContactUs $formContact
     * @return Renderable
     */
    public function create(FormContactUs $formContact)
    {
        return view('contactus::Form.create', compact('formContact'));
    }

    /**
     * Store a newly created resource in storage.
     * @param FormContactUsStoreRequest $request
     * @param FormContactUs $formContact
     * @return Renderable
     */
    public function store(FormContactUsStoreRequest $request, FormContactUs $formContact)
    {
        $this->fillRequest($request, $formContact);

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
        $formContact = FormContactUs::findOrFail($id);
        return view('contactus::Form.edit', compact('formContact'));
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
     * @param FormContactUsUpdateRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(FormContactUsUpdateRequest $request, $id)
    {
        $formContact = FormContactUs::findOrFail($id);
        $this->fillRequest($request, $formContact);

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
        FormContactUs::findOrFail($id)->delete();

        return  response('Ok!Deleted FormContactUs successfully!', Response::HTTP_OK);
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        FormContactUs::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!Restored FormContactUs successfully!', Response::HTTP_OK);
    }

    /**
     * Return contents list data
     */
    public function list()
    {
        return DataTables::of(FormContactUs::withTrashed())
            ->addColumn('actions', function ($formContact) {
                return $this->actionColumn($formContact);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Contents list action column
     *
     * @param FormContactUs $formContact
     * @return View
     */
    private function actionColumn($formContact)
    {
        return view('contactus::Form.partials.action_column', compact('formContact'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var FormContactUs $model
         * @var Request $request
         */
        $model->fill($request->only($model->getFillable()));
        $model->saveOrFail();
    }
}
