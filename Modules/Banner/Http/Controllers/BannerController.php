<?php

namespace Modules\Banner\Http\Controllers;

use App\Http\Traits\Dashboard\uploadFiles;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Banner\Entities\Banner;
use Modules\Banner\Http\Requests\BannerStoreRequest;
use Modules\Banner\Http\Requests\BannerUpdateRequest;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    use uploadFiles;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('banner::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Banner $banner
     * @return Renderable
     */
    public function create(Banner $banner)
    {
        return view('banner::create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Banner $banner
     * @param BannerStoreRequest $request
     * @return Renderable
     */
    public function store(BannerStoreRequest $request, Banner $banner)
    {
        $this->fillRequest($request, $banner);

        session()->flash('success', 'بنر مورد نظر با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banner::edit', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('banner::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param BannerUpdateRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(BannerUpdateRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $this->fillRequest($request, $banner);

        session()->flash('success', 'بنر مورد نظر با موفقیت ویرایش گردید.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Banner::findOrFail($id)->delete();

        return  response('Ok!Deleted Banner successfully!', Response::HTTP_OK);
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        Banner::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!Restored Banner successfully!', Response::HTTP_OK);
    }

    /**
     * Enable contents
     *
     * @param Request $request
     * @return Response
     */
    public function enable(Request $request)
    {
        Banner::where('id', $request->id)->update([
            'status' => 1
        ]);

        return response('Ok!Banner status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Disable contents
     *
     * @param Request $request
     * @return Response
     */
    public function disable(Request $request)
    {
        Banner::where('id', $request->id)->update([
            'status' => 0
        ]);

        return response('Ok!Banner status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Return contents list data
     */
    public function list()
    {
        return DataTables::of(Banner::withTrashed())
           ->addColumn('actions', function ($banner) {
                return $this->actionColumn($banner);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Contents list action column
     *
     * @param Banner $banner
     * @return View
     */
    private function actionColumn($banner)
    {
        return view('banner::partials.action_column', compact('banner'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var Banner $model
         * @var Request $request
         */
        $model->fill($request->except('status', 'image'));
        $model->saveOrFail();
        if ($request->status == "on"){
            $model->update([
                'status' => 1
            ]);
        }
        else{
            $model->update([
                'status' => 0
            ]);
        }
        $this->uploadFiles($request, $model);
    }

    private function uploadFiles($request, $model)
    {
        if ($request->has('image')) {
            $path = "uploads/Banner/$model->id/$model->image";
            $filepath = "uploads/Banner/$model->id";
            if ($model->type == 1) {
                $model->update([
                    'image' => $this->uploadImage(request(), $model, 'image', $path, $filepath, ['width' => 670, 'height' => 450]),
                ]);
            }
            elseif ($model->type == 2) {
                $model->update([
                    'image' => $this->uploadImage(request(), $model, 'image', $path, $filepath, ['width' => 640, 'height' => 215]),
                ]);
            }
            elseif ($model->type == 3) {
                $model->update([
                    'image' => $this->uploadImage(request(), $model, 'image', $path, $filepath, ['width' => 330, 'height' => 215]),
                ]);
            }
            elseif ($model->type == 0) {
                $model->update([
                    'image' => $this->uploadImage(request(), $model, 'image', $path, $filepath, ['width' => 290, 'height' => 100]),
                ]);
            }
        }
    }
}
