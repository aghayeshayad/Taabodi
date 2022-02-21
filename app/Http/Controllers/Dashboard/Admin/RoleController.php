<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {
        $this->middleware('role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Role $roles)
    {
        $permission = Permission::get();
        $rolePermissions = null;
        return view('roles.create',compact('permission', 'roles', 'rolePermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->where("role_has_permissions.role_id",$id)->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->get();
        return view('roles.edit',compact('roles','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return  response('Ok!Deleted roles successfully!', Response::HTTP_OK);
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        Role::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!Restored roles successfully!', Response::HTTP_OK);
    }

    /**
     * Return contents list data
     */
    public function list()
    {
        return DataTables::of(Role::all())
            ->addColumn('actions', function ($roles) {
                return $this->actionColumn($roles);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Contents list action column
     *
     * @param Role $roles
     * @return View
     */
    private function actionColumn($roles)
    {
        return view('roles.partials.action_column', compact('roles'));
    }
}
