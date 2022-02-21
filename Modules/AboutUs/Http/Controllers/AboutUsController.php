<?php

namespace Modules\AboutUs\Http\Controllers;

use App\Http\Traits\Dashboard\uploadFiles;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\AboutUs\Entities\AboutUs;
use Modules\AboutUs\Http\Requests\About\AboutStoreRequest;
use Modules\AboutUs\Http\Requests\About\AboutUpdateRequest;
use Yajra\DataTables\DataTables;

class AboutUsController extends Controller
{
    use uploadFiles;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('aboutus::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param AboutUs $about
     * @return Renderable
     */
    public function create(AboutUs $about)
    {
        return view('aboutus::create', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     * @param AboutStoreRequest $request
     * @param AboutUs $about
     * @return Renderable
     */
    public function store(AboutStoreRequest $request, AboutUs $about)
    {
        $this->fillRequest($request, $about);

        session()->flash('success', 'اطلاعات درباره ما مورد نظر با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $about = AboutUs::findOrFail($id);
        return view('aboutus::edit', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('aboutus::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param AboutUpdateRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(AboutUpdateRequest $request, $id)
    {
        $about = AboutUs::findOrFail($id);
        $this->fillRequest($request, $about);

        session()->flash('success', 'اطلاعات درباره ما مورد نظر با موفقیت ویرایش گردید.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        AboutUs::findOrFail($id)->delete();

        return  response('Ok!Deleted AboutUs successfully!', Response::HTTP_OK);
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        AboutUs::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!Restored AboutUs successfully!', Response::HTTP_OK);
    }

    public function deleteFile(Request $request)
    {
        $about = AboutUs::findOrFail($request->id);

        $file = "Uploads/About/$about->id/$about->file";

        if (file_exists($file)) {
            File::delete($file);

            $about->update([
                'file' => null
            ]);
        }
    }

    /**
     * Return contents list data
     */
    public function list()
    {
        return DataTables::of(AboutUs::withTrashed())
            ->addColumn('actions', function ($about) {
                return $this->actionColumn($about);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Contents list action column
     *
     * @param AboutUs $about
     * @return Response
     */
    private function actionColumn($about)
    {
        return view('aboutus::partials.action_column', compact('about'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var AboutUs $model
         * @var Request $request
         */
        $model->fill($request->except('image', 'file'));
        $model->saveOrFail();
        $this->uploadFiles($request, $model);
    }

    private function uploadFiles($request, $model)
    {
        if ($request->has('image')) {
            $path = "Uploads/About/$model->id/$model->image";
            $filepath = "Uploads/About/$model->id";

            $model->update([
                'image' => $this->uploadImage(request(), $model, 'image', $path, $filepath, ['width' => 1100, 'height' => 560]),
            ]);
        }
        if ($request->has('file')) {
            $FileName = time().'.'.request()->file('file')->getClientOriginalExtension();
            request()->file->move(public_path("uploads/About/$model->id"), $FileName);

            $model->update([
                'file' => $FileName
            ]);
        }
    }
}
