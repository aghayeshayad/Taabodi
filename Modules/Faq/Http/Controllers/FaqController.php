<?php

namespace Modules\Faq\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Faq\Entities\Faq;
use Modules\Faq\Http\Requests\requestCheckFaq;
use Modules\FaqCategory\Entities\faqCategory;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $faq = Faq::all();
        return view('faq::index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     * @param faq $faq
     * @return Response
     */
    public function create(faq $faq)
    {
        return view('faq::create', compact('faq'));
    }

    /**
     * Store a newly created resource in storage.
     * @param requestCheckFaq $request
     * @return Response
     */
    public function store(requestCheckFaq $request, faq $faq)
    {
        $this->fillRequest($request, $faq);
        session()->flash('success', 'سوال متداول موردنظر با موفقیت ثبت گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faq::show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faq::edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     * @param requestCheckFaq $request
     * @param int $id
     * @return Response
     */
    public function update(requestCheckFaq $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $this->fillRequest($request, $faq);
        session()->flash('success', 'سوال متداول موردنظر با موفقیت ویرایش گردید.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param faq $faq
     * @return Response
     */
    public function destroy($faq)
    {
        Faq::findOrFail($faq)->delete();
        return response('OK!User deleted successfully!', Response::HTTP_OK);
    }

    /**
     * Enable contents
     *
     * @param Request $request
     * @return Response
     */
    public function enable(Request $request)
    {
        Faq::findOrFail($request->id)->update([
            'status' => 1
        ]);

        return response('Ok!Content status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Disable contents
     *
     * @param Request $request
     * @return Response
     */
    public function disable(Request $request)
    {
        Faq::findOrFail($request->id)->update([
            'status' => 0
        ]);

        return response('Ok!Content status changed successfully!', Response::HTTP_OK);
    }

    /**
     * @return Response
     * @throws \Exception
     */
    public function list()
    {
        return DataTables::of(Faq::withTrashed())
            ->addColumn('actions', function ($faq) {
                return $this->actionColumn($faq);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Return users list action column
     *
     * @param faq $faq
     * @return Response
     */
    private function actionColumn($faq)
    {
        return view('faq::partials.action_column', compact('faq'));
    }


    private function fillRequest($request, $model)
    {
        /**
         * @var Request $request
         * @var faq $model
         */
        $model->fill($request->except('status'));
        if ($request->status == 'on') {
            $model->status = 1;
        } else {
            $model->status = 0;
        }
        $model->saveOrFail();
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        faq::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!Restored content successfully!', Response::HTTP_OK);
    }

}
