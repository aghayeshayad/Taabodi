<?php

namespace Modules\Sliders\Http\Controllers;

use App\Http\Traits\Dashboard\uploadFiles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Sliders\Entities\Slider;
use Modules\Sliders\Http\Requests\SliderStoreRequest;
use Modules\Sliders\Http\Requests\SliderUpdateRequest;
use Yajra\DataTables\DataTables;

class SlidersController extends Controller
{
    use uploadFiles;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('sliders::index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Slider $slider
     * @return Response
     */
    public function create(Slider $slider)
    {
        return view('sliders::create', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Slider $slider
     * @return Response
     */
    public function store(SliderStoreRequest $request, Slider $slider)
    {
        $this->fillRequest($request, $slider);

        session()->flash('success', 'اسلایدر جدید با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders::edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $this->fillRequest($request, $slider);

        session()->flash('success', 'اسلایدر مورد نظر با موفقیت ویرایش گردید.');
        return  back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();

        return  response('Ok!Slider deleted successfully.', Response::HTTP_OK);
    }

    /**
     * Restore the specified resource from storage.
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        Slider::withTrashed()->findOrFail($request -> id)->restore();

        return  response('Ok!Slider restored successfully.', Response::HTTP_OK);
    }

    /**
     * Return question list data
     */
    public function list()
    {
        return DataTables::of(Slider::withTrashed())
            ->addColumn('actions', function ($slider) {
                return $this->actionColumn($slider);
            })->rawColumns(['actions'])->make(true);
    }

    private function actionColumn($slider)
    {
        return view('sliders::partials.action_column', compact('slider'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var Request $request
         * @var Slider $model
        */

        $model->fill($request->only($model->getFillable()));
        $model->saveOrFail();

        if ($request->has('image')) {
            $path = "uploads/Sliders/$model->id/$model->image";
            $filepath = "uploads/Sliders/$model->id";

            $model->update([
                'image' => $this->uploadImage($request, $model, 'image', $path, $filepath, ['width' => 1903, 'height' => 600]),
            ]);
        }
    }
}
