<?php

namespace Modules\Rule\Http\Controllers;

use App\Http\Traits\Dashboard\uploadFiles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Rule\Entities\Rule;
use Modules\Rule\Http\Requests\RuleStoreRequest;
use Modules\Rule\Http\Requests\RuleUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class RuleController extends Controller
{
    use uploadFiles;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('rule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Rule $rule
     * @return Response
     */
    public function create(Rule $rule)
    {
        return view('rule::create',compact('rule'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ruleStoreRequest $request
     * @param rule $rule
     * @return void
     */
    public function store(RuleStoreRequest $request, Rule $rule)
    {
        $this->fillRequest($request, $rule);

        session()->flash('success', 'قانون جدید با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $rule=Rule::findOrFail($id);
        return view('rule::edit',compact('rule'));
    }


    /**
     * Update the specified resource in storage.
     * @param RuleUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(RuleUpdateRequest $request, $id)
    {
        $rule=Rule::FindOrFail($id);
        $this->fillRequest($request,$rule);
        session()->flash('success', 'قانون مورد نظر با موفقیت ویرایش گردید.');
        return  back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Rule::findOrFail($id)->delete();

        return  response('Ok!rule deleted successfully.', Response::HTTP_OK);
    }

    /**
     * Restore the specified resource from storage.
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        Rule::withTrashed()->findOrFail($request -> id)->restore();

        return  response('Ok!Rule restored successfully.', Response::HTTP_OK);
    }

    /**
     * Return question list data
     */
    public function list()
    {
        return DataTables::of(Rule::withTrashed())
            ->addColumn('actions', function ($rule) {
                return $this->actionColumn($rule);
            })->rawColumns(['actions'])->make(true);
    }



    private function actionColumn($rule)
    {
        return view('rule::partials.action_column', compact('rule'));
    }


    private function fillRequest($request, $model)
    {
        /**
         * @var Request $request
         * @var Rule $model
         */

        $model->fill($request->only($model->getFillable()));

        $model->saveOrFail();

    }
}
