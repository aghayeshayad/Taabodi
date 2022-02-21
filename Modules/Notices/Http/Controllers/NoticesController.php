<?php

namespace Modules\Notices\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Notices\Entities\Notice;
use Modules\Notices\Http\Requests\NoticesStoreRequest;
use Modules\Notices\Http\Requests\NoticesUpdateRequest;
use Yajra\DataTables\DataTables;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('notices::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Notice $notices
     * @return Renderable
     */
    public function create(Notice $notices)
    {
        return view('notices::create', compact('notices'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Notice $notices
     * @param NoticesStoreRequest $request
     * @return Renderable
     */
    public function store(NoticesStoreRequest $request, Notice $notices)
    {
        $this->fillRequest($request, $notices);

        session()->flash('success', 'خبرنامه مورد نظر با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $notices = Notice::findOrFail($id);
        return view('notices::show', compact('notices'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('notices::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param NoticesUpdateRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(NoticesUpdateRequest $request, $id)
    {
        $notices = Notice::findOrFail($id);
        $this->fillRequest($request, $notices);

        session()->flash('success', 'خبرنامه مورد نظر با موفقیت ویرایش گردید.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Notice::findOrFail($id)->delete();

        return  response('Ok!Deleted Notice successfully!', Response::HTTP_OK);
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        Notice::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!Restored Notice successfully!', Response::HTTP_OK);
    }

    /**
     * Return list data
     */
    public function list()
    {
        return DataTables::of(Notice::withTrashed())
            ->addColumn('actions', function ($notices) {
                return $this->actionColumn($notices);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * list action column
     *
     * @param Notice $notices
     * @return View
     */
    private function actionColumn($notices)
    {
        return view('notices::partials.action_column', compact('notices'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var Notice $model
         * @var Request $request
         */
        $model->fill($request->only($model->getFillable()));
        $model->saveOrFail();
    }
}
